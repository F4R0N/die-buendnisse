<link href="styles/style-login.css" rel='stylesheet' type='text/css'>
<script>
    $(document).ready(function() {
        $('input[type=text]').focus();
    });
</script>

<header>
    <h1 class="header center">Die B&uuml;ndnisse</h1>
</header>
<div>
    <div id="login" class="center">
        <?php if (isset($data['login_msg'])): ?>
            <script>
                $(document).ready(function() {
                    $('#login_msg').fadeOut(3000);
                });
            </script>
            <div id="login_msg"><?= $data['login_msg']; ?></div>
        <?php endif; ?>
        <h3 class="header center">Login</h3>
        <form action="" method="POST" accept-charset="ISO-ISO-8859-1">
            Benutzername
            <input type="text" name="Benutzername" maxlength="32">
            Passwort
            <input type="password" name="Passwort" placeholder="******">
            <input type="submit" name="Einloggen" value="Einloggen">
        </form>
    </div>
</div>
