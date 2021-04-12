<style>@import url('../../assets/css/auth.css');</style>
<div class="window">
    <div class="logo">
        <img class="unselectable" src="../../../assets/images/logo.png">
    </div>
    <form id="loginForm">
        <input type="text" name="username" id="username" placeholder="Username" pattern="^[A-Za-z0-9]+$" required>
        <input type="password" name="password" id="password" placeholder="Password" pattern='^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$' required>
        <div class="submit"><input type="submit" value="Log in"></div>
    </form>
    <div class="other">
        <a class="unselectable">Need an account?</a>
        <a class="unselectable">Forgot password?</a>
    </div>
</div>