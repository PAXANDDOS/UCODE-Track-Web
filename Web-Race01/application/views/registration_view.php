<style>@import url('../../assets/css/auth.css');</style>
<div class="window">
    <div class="logo">
        <img class="unselectable" src="../../../assets/images/logo.png">
    </div>
    <form id="regForm">
        <input type="text" name="username" id="username" placeholder="Username" pattern="^[A-Za-z0-9]+$" required>
        <input type="text" name="name" id="name" placeholder="Name" pattern="^[A-Za-zА-Яа-яЁё\s]+$" required>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <span class="unselectable">Minimum eight characters, at least one letter and one number</span>
        <input type="password" name="password" id="password" placeholder="Password" pattern='^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$' tooltip=" sd" required>
        <input type="password" name="conpassword" id="conpassword" placeholder="Confirm passwordd" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" required>
        <div class="submit"><input type="submit" value="Join"></div>
    </form>
    <div class="other">
        <a class="unselectable">Already have an account?</a>
    </div>
</div>