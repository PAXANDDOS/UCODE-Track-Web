<style>@import url('/assets/css/auth.css');</style>
<?php if(isset($error)) 
    echo('
    <div class="window message error unselectable">
        <label>'.$error.'</label>
    </div>
    ');
?>
<div class="window">
    <div class="logo">
        <img class="unselectable" src="/assets/images/logo.png">
    </div>
    <form id="loginForm" method="post">
        <input type="text" name="username" id="username" placeholder="Username" pattern="^[A-Za-z0-9]+$" required>
        <input type="password" name="password" id="password" placeholder="Password" pattern='^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$' required>
        <div class="submit"><input type="submit" name="log" value="Log in"></div>
    </form>
    <div class="other">
        <a class="unselectable" href="/registration">Need an account?</a>
        <a class="unselectable" href="/reminder">Forgot password?</a>
    </div>
</div>