<style>@import url('/assets/css/auth.css');</style>
<?php if(isset($error)) echo('
    <div class="window message error unselectable">
        <label>'.$error.'</label>
    </div>
    ');
    if(isset($action)) echo('
    <div class="window message action unselectable">
        <label>'.$action.'</label>
    </div>
    ');
?>
<div class="window">
    <div class="logo">
        <img class="unselectable" src="/assets/images/logo.png">
    </div>
    <form id="remForm" method="post">
        <input type="email" name="email" id="email" placeholder="Your email" required>
        <div class="submit"><input type="submit" name="rem" value="Send new password"></div>
    </form>
    <div class="other">
        <a class="unselectable" href="/login">Back</a>
    </div>
</div>