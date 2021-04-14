<style>@import url('/assets/css/lobby.css');</style>
<section class="window">
    <h1 class="unselectable">Welcome to <br>Marvel <b>Heroes of the Earth-199999<b>!</h1>
    <div class="profile">
        <div class="avatarBox">
            <img src="/assets/images/cards/<?php echo $avatar ?>.jpeg">
        </div>
        <div class="buttons unselectable">
            <form method="post">
                <input name="battleButton" type="submit" id="battleButton" value='Battle!'>
                <input name="avatarButton" type="submit" id="avatarButton" value='Change avatar'>
                <input name="logoutButton" type="submit" id="logoutButton" value='Log out'>
            </form>
        </div>
    </div>
</section>
<section class="window stats">
    <h1 class="unselectable"><b><?php echo $_SESSION['login']?></b>'s stats:</h1>
    <div class="content">
        <div class="headers unselectable">
            <label>Total games:</label>
            <label>Total wins:</label>
            <label>Total loses:</label>
        </div>
        <div class="data">
            <label><?php echo $totalGames ?></label>
            <label><?php echo $totalWins ?></label>
            <label><?php echo $totalLoses ?></label>
        </div>
    </div>
</section>

