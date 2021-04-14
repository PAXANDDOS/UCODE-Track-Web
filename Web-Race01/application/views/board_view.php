<style>@import url('/assets/css/board.css');</style>
<style>@import url('/assets/css/board_enemy.css');</style>
<style>@import url('/assets/css/board_player.css');</style>
<script src="/assets/js/vanilla-tilt.js" defer></script>
<main>
    <div class="enemy_board unselectable">
        <section class="enemy_hand">
            <div class="enemy_handInner">
                <div class="enemy_handCard"></div>
                <div class="enemy_handCard"></div>
                <div class="enemy_handCard"></div>
                <div class="enemy_handCard"></div>
                <div class="enemy_handCard"></div>
            </div>
        </section>
        <section class="enemy_stat">
            <div class="enemy_statInner">
                <div class="enemy_statLogo">
                    <img src="/assets/images/cards/<?php echo $enemyAvatar ?>.jpeg" alt="enemyImage">
                    <div class="enemy_statHealth">
                        <span id="enemy_currentHealth">20</span>
                    </div>
                </div>
                <div class="enemy_statName">
                    <label><?php echo $enemyUsername ?></label>
                </div>
                <div class="enemy_statStones">
                    <label><label id="enemy_currentStones">6</label> / 6</label>
                </div>
            </div>
        </section>
        <section class="enemy_deck">
            <div class="entity_card" data-tilt data-tilt-max="0" data-tilt-scale="1.2">
                <img src="/assets/images/enemy.png" alt="enemyCard">
                <div class="entity_cardAttack">
                    <span id="card_currentAttack">2</span>
                </div>
                <div class="entity_cardDefense">
                    <span id="card_currentDefense">3</span>
                </div>
            </div>
            <div class="entity_card" data-tilt data-tilt-max="0" data-tilt-scale="1.2">
                <img src="/assets/images/enemy.png" alt="enemyCard">
                <div class="entity_cardAttack">
                    <span id="card_currentAttack">2</span>
                </div>
                <div class="entity_cardDefense">
                    <span id="card_currentDefense">3</span>
                </div>
            </div>
            <div class="entity_card" data-tilt data-tilt-max="0" data-tilt-scale="1.2">
                <img src="/assets/images/enemy.png" alt="enemyCard">
                <div class="entity_cardAttack">
                    <span id="card_currentAttack">2</span>
                </div>
                <div class="entity_cardDefense">
                    <span id="card_currentDefense">3</span>
                </div>
            </div>
        </section>
    </div>
    <div class="player_board unselectable">
        <section class="player_deck">
        <div class="entity_card">
                <img src="/assets/images/enemy.png" alt="enemyCard">
                <div class="entity_cardAttack">
                    <span id="card_currentAttack">2</span>
                </div>
                <div class="entity_cardDefense">
                    <span id="card_currentDefense">3</span>
                </div>
            </div>
            <div class="entity_card">
                <img src="/assets/images/enemy.png" alt="enemyCard">
                <div class="entity_cardAttack">
                    <span id="card_currentAttack">2</span>
                </div>
                <div class="entity_cardDefense">
                    <span id="card_currentDefense">3</span>
                </div>
            </div>
        </section>
        <section class="player_stat">
        <div class="player_statInner">
                <div class="player_statLogo">
                    <img src="/assets/images/cards/<?php echo $avatar ?>.jpeg" alt="playerImage">
                    <div class="player_statHealth">
                        <span id="player_currentHealth">20</span>
                    </div>
                    <div class="player_statStones">
                        <img src="/assets/images/mana_crystal.png">
                        <span id="player_currentStones">6</span>
                    </div>
                </div>
        </section>
        <section class="player_hand">
            <div class="player_handInner">
                <div class="player_handCard">
                    <div class="handcardImage">
                        <img src="/assets/images/cringe.png" alt="handcardImage">
                    </div>
                    <label id="handcard_label">Cringe attack</label>
                    <span id="handcard_description">Makes cringe because php is shit and we better should use nodejs who the fuck invented php why did you do that sample text sample text sample text</span>
                </div>
            </div>
        </section>
    </div>
</main>