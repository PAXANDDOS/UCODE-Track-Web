<?php
    class Card 
    {
        function __construct($alias, $attack, $defence, $cost, $images) 
        {
            $this->alias = $alias;
            $this->attack = $attack;
            $this->defence = $defence;
            $this->cost = $cost;
            $this->canAtack = false;
            $this->images = $images;
        }

        function getAl()
        {
            return $this->alias;
        }
        function getAt()
        {
            return $this->attack;
        }
        function getDe()
        {
            return $this->defence;
        }
        function getCo()
        {
            return $this->cost;
        }
        function getIm()
        {
            return $this->images;
        }

    }
    
    class Deck 
    {
        function __construct() 
        {
            $this->cards = [];
        }
    
        function createDeck() 
        {
            $alias = ['Black Widow', 'Captain America', 'Dr. Strange', 'Drax', 'Nick Fury', 'Gamora', 
            'Groot', 'Iron-man', 'Loki', 'Nebula', 'Deadpool', 'Rocket', 'Spider-man', 'Star-Lord', 'Thanos', 
            'Thor', 'Vision', 'Wanda Maximoff', 'Winter Soldier', 'Yondu'];
            $attack = [3, 4, 5, 5, 3, 2, 4, 6, 3, 3, 4, 4, 5, 4, 8, 7, 4, 6, 5, 4];
            $defence = [3, 7, 5, 5, 3, 3, 5, 6, 4, 3, 8, 2, 3, 3, 8, 5, 3, 4, 5, 3];
            $cost = [1, 2, 3, 3, 1, 1, 2, 3, 2, 2, 1, 5, 2, 2, 2, 6, 4, 2, 4, 3];
            $images = ['blackWidow.png', 'captainAmerica.png', 'doctor.png', 'drax.png', 'fury.png', 'gamora.png',
            'groot.png', 'iron.png', 'loki.png', 'nebula.png', 'pool.png', 'rocket.png', 'spider.png', 'starLord.png',
            'thanos.png', 'thor.png', 'vision.png', 'wanda.png', 'winter.png', 'yondu.png'];
            for ($i = 0; $i < count($alias); $i++) 
                array_push($this->cards, new Card($alias[$i], $attack[$i], $defence[$i], $cost[$i], $images[$i]));
        }

        function shuffleDeck() 
        {
            shuffle($this->cards);
        }
    }

    class Player 
    {
        public $playerName;
        public $avatar;
        public $health; 
        public $mana;
        public $maxMana;
        public $cards = array();
        public $usedCards = array();

        public $status = 'play';
        public $canPlay;

        function __construct($name, $avatar) 
        {
            $this->playerName = $name;
            $this->health = 20;
            $this->mana = 1;
            $this->currentMana = 1;
            $this->usedCards = [];
            $this->canPlay;
            $this->maxMana = 6;
            $this->avatar = $avatar;
        }

        public function setCards($cards)
        {
            $this->cards = $cards;
        }

        public function DropCard($index)
        {
            echo "hyi pizda";
            if($this->cards[$index]->cost <= $this->mana)
            {
                echo "asdasdkjjasfjdsfalkj";
                $this->mana -= $this->cards[$index]->cost;
                $this->usedCards[] = $this->cards[$index];
                array_splice($this->cards, $index, 1);
            }
        }

        public function TryToAtackCard($index, $indexCardToAtack, $enemy)
        {
            $card = $this->usedCards[$index];
            if($card->canAtack)
            {
                $enemy->usedCards[$indexCardToAtack]->defence -= $card->atack;
                $card->defence -= $enemy->usedCards[$indexCardToAtack]->atack;

                $card->canAtack = false;

                if($this->usedCards[$index]->defence <= 0)
                    array_splice($this->usedCards, $index, 1);

                if($enemy->usedCards[$indexCardToAtack]->defence <= 0)
                    array_splice($enemy->usedCards, $indexCardToAtack);
            }
        }

        public function AtackPlayer($index, $player)
        {
            $card = $this->usedCards[$index];
            if($card->canAtack)
            {
                $player->health -= $card->atack;
                if($player->health <= 0)
                {
                    $player->health = 0;
                    $player->status = 'lose';
                    $this->status = 'win';
                }

                $card->canAtack = false;
            }
    }
    }
