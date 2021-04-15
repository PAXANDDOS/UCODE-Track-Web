<style>@import url('/assets/css/board.css');</style>
<style>@import url('/assets/css/board_enemy.css');</style>
<style>@import url('/assets/css/board_player.css');</style>
<script src="/assets/js/vanilla-tilt.js" defer></script>
<style>@import url('/assets/css/search.css');</style>
<div class="searchScreen window unselectable">
	<div class="searchAnim">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
			<circle cx="28" cy="75" r="11" fill="#9d6cff">
				<animate attributeName="fill-opacity" repeatCount="indefinite" dur="1.25s" values="0;1;1" keyTimes="0;0.2;1" begin="0s"></animate>
			</circle>
			<path d="M28 47A28 28 0 0 1 56 75" fill="none" stroke="#b38dff" stroke-width="10">
				<animate attributeName="stroke-opacity" repeatCount="indefinite" dur="1.25s" values="0;1;1" keyTimes="0;0.2;1" begin="0.125s"></animate>
			</path>
			<path d="M28 25A50 50 0 0 1 78 75" fill="none" stroke="#c4a7ff" stroke-width="10">
				<animate attributeName="stroke-opacity" repeatCount="indefinite" dur="1.25s" values="0;1;1" keyTimes="0;0.2;1" begin="0.25s"></animate>
				</path>
		</svg>
	</div>
	<h1 id="insearch" >Waiting for evil to rise...</h1>
	<form method="post">
		<input type="submit" name="cancelSearch" value="I'm not ready">
	</form>
</div>

<script src="assets/js/socket.js" defer type="text/JavaScript"></script>
<script src="assets/js/parser.js" defer type="text/JavaScript"></script>

<main id="mainGame">
    <input id="endturn" type="submit" value="END TURN">
    <div class="enemy_board unselectable">
        <section class="enemy_hand">
            <div class="enemy_handInner">
            </div>
        </section>
        <section class="enemy_stat">
            <div class="enemy_statInner">
                <div class="enemy_statLogo">
                    <img id="enemyAvatar" src="/assets/images/avatars/1.jpeg" alt="enemyImage">
                    <div class="enemy_statHealth">
                        <span id="enemy_currentHealth">20</span>
                    </div>
                </div>
                <div class="enemy_statName">
                    <label id="enemyUsername">temp</label>
                </div>
                <div class="enemy_statStones">
                    <img src="/assets/images/mana_crystal.png">
                    <span id="enemy_currentStones">6</span>
                </div>
            </div>
        </section>
        <section class="enemy_deck">
        </section>
    </div>
    <div class="player_board unselectable">
        <section class="player_deck">
        </section>
        <section class="player_stat">
        <div class="player_statInner">
                <div class="player_statLogo">
                    <img src="/assets/images/avatars/<?php echo $avatar ?>.jpeg" alt="playerImage">
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
            </div>
        </section>
    </div>
</main>