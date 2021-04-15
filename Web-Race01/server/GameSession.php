<?php

include_once "GameCLasses.php";
include_once 'application/controllers/controller_database.php';

class GameSession
{
    private $client0;
    private $client1;
    private $player0;
    private $player1;

    public function __construct($client0, $client1)
    {
        $this->client0 = $client0;
        $this->client1 = $client1;
    }

    public function initSession()
    {
        socket_set_block($this->client0);
        socket_set_block($this->client1);

        $data = SocketServer::decode(socket_read($this->client0, 1024));
        $this->player0 = new Player(json_decode($data['payload'])->playerName, json_decode($data['payload'])->avatar);

        $data = SocketServer::decode(socket_read($this->client1, 1024));
        $this->player1 = new Player(json_decode($data['payload'])->playerName, json_decode($data['payload'])->avatar);

        $deck = new Deck();
        $deck->createDeck();
        $deck->shuffleDeck();

        $this->player0->cards = array_slice($deck->cards, 0, 10);

        $this->player1->cards = array_slice($deck->cards, 10, 20);
    }

    private function SendPlayersInfoToBothClients()
    {
        $this->SendPlayersInfoToClient0();
        $this->SendPlayersInfoToClient1();
    }

    private function SendPlayersInfoToClient0()
    {
        $playerInfo = array();
        $playerInfo[] = $this->player0;
        $playerInfo[] = $this->player1;

        socket_write($this->client0, SocketServer::encode(json_encode($playerInfo)));
    }

    private function SendPlayersInfoToClient1()
    {
        $playerInfo = array();
        $playerInfo[] = $this->player1;
        $playerInfo[] = $this->player0;

        socket_write($this->client1, SocketServer::encode(json_encode($playerInfo)));
    }

    public function SessionLoop()
    {
        socket_set_nonblock($this->client0);
        socket_set_nonblock($this->client1);

        $turn = rand(0, 2);
        $turn = 0;

        if($turn == 0)
        {
            $this->player0->canPlay = true;
            $this->player1->canPlay = false;
        }
        else
        {
            $this->player1->canPlay = true;
            $this->player0->canPlay = false;
        }

        $this->SendPlayersInfoToBothClients();

        while($this->player0->health > 0 || $this->player1->health > 0) // card.count != 0
        {
            $currentPlayer;
            $enemyPlayer;

            $currentClient;
            $enemyClient;

            if($turn == 0)
            {
                $currentPlayer = $this->player0;
                $enemyPlayer = $this->player1;

                $currentClient = $this->client0;
                $enemyClient = $this->client1;
            }
            else
            {
                $currentPlayer = $this->player1;
                $enemyPlayer = $this->player0;

                $currentClient = $this->client1;
                $enemyClient = $this->client0;
            }

            $sockStr = socket_read($enemyClient, 1024);
            if($sockStr === "")
            {
                $this->closeClients();
                break;
            }

            $sockStr = socket_read($currentClient, 1024);
            if($sockStr === false)
            {
                yield;
            }
            if($sockStr === "")
            {
                $this->closeClients();
                break;
            }

            $data = SocketServer::decode($sockStr);
            
            $json;
            if(isset($data['payload']))
                $json = json_decode($data['payload']);
            else
                $json = "";
            
            if(isset($json->nameOfOperation))
                $nameOfOperation = $json->nameOfOperation;
            else
                $nameOfOperation = "";

            if($nameOfOperation == 'changeTurn')
            {
                echo $currentPlayer->playerName;
                $currentPlayer->canPlay = false;
                $enemyPlayer->canPlay = true;

                if($currentPlayer->currentMana < $currentPlayer->maxMana)
                    $currentPlayer->currentMana++;
                $currentPlayer->mana = $currentPlayer->currentMana;

                foreach($currentPlayer->usedCards as $card)
                    $card->canAtack = true;
                
                if($turn == 1)
                    $turn = 0;
                else
                    $turn = 1;

                $this->SendPlayersInfoToBothClients();
            }
            if($nameOfOperation == 'dropCard')
            {
                echo "droped\n";
                echo "playername: " . $currentPlayer->playerName . "\n";
                $cardIndex = (json_decode($data['payload']))->indexOfCard;
                echo "index: " . $cardIndex;

                $currentPlayer->DropCard($cardIndex);

                $this->SendPlayersInfoToBothClients();
            }
            if($nameOfOperation == 'attackPlayer')
            {
                $cardIndex = (json_decode($data['payload']))->indexOfCard;
                $currentPlayer->AtackPlayer($cardIndex, $enemyPlayer);

                if($enemyPlayer->status == 'lose')
                {
                    $user = new User();

                    $user->incrementTotalGames($currentPlayer->playerName);
                    $user->incrementTotalGames($enemyPlayer->playerName);

                    $user->incrementTotalWins($currentPlayer->playerName);
                    $user->incrementTotalLoses($enemyPlayer->playerName);

                    $this->closeClients();
                }

                $this->SendPlayersInfoToBothClients();
            }
            if($nameOfOperation == 'attackCard')
            {
                $cardIndex = (json_decode($data['payload']))->indexOfCard;
                $cardToAtackIndex = (json_decode($data['payload']))->indexCardToAttack;

                $currentPlayer->AtackPlayer($cardIndex, $cardToAtackIndex, $enemyPlayer);

                $this->SendPlayersInfoToBothClients();
            }
            yield;
        }
        echo "end of gameLoop\n";
    }

    private function closeClients()
    {
        socket_shutdown($this->client0);
        //socket_close($this->client0);
        socket_shutdown($this->client1);
        //socket_close($this->client1);
    }
}
