<link href="styles/style-login.css" rel='stylesheet' type='text/css'>
<header>
    <h1 class="header center">Die B&uuml;ndnisse</h1>
</header>
<div id="box"  class="center">
    <?php if ($data['errors']['felder_leer']): ?>
        <script>
            $(document).ready(function() {
                $('#box_msg').fadeOut(5000);
            });
        </script>
        <div id="box_msg">Felder wurden nicht ausgef&uuml;llt!</div>
    <?php endif; ?>
    <h3 class="header center">Registrieren</h3>
    <form action="" method="POST" accept-charset="ISO-ISO-8859-1">
        <input value="<?=$data['form_data']['benutzername'] ?>" type="text" name="benutzername" maxlength="32" placeholder="Benutzername">
        <?php if ($data['errors']['benutzername_vorhanden']): ?>
            <div class="error">Benutzername bereits vorhanden</div>
        <?php endif; ?>
        <?php if ($data['errors']['benutzername_laenge']): ?>
            <div class="error">Benutzername ist zu lang! (max 32 Zeichen)</div>
        <?php endif; ?>
        </input>
        <input type="password" name="passwort" placeholder="Passwort">
        <?php if ($data['errors']['passwort_laenge']): ?>
            <div class="error">Passwort sollte l&auml;ger als 6 Zeichen sein!</div>
        <?php endif; ?>
        </input>
        <input type="password" name="passwort_wdh" placeholder="Passwort wiederholen">
        <?php if ($data['errors']['passwort_wdh']): ?>
            <div class="error">Passw&ouml;rter stimmen nicht &uuml;berein!</div>
        <?php endif; ?>
        </input>
        <input value="<?=$data['form_data']['email'] ?>" type="email" name="email" placeholder="E-Mail">
        <?php if ($data['errors']['email_vorhanden']): ?>
            <div class="error">E-Mail wird bereits verwendet</div>
        <?php endif; ?>
        <?php if ($data['errors']['email_falsch']): ?>
            <div class="error">E-Mail ist falsch!</div>
        <?php endif; ?>
        </input>
        AGBs akzeptieren<input type="checkbox" name="agbs" value="true">
        <?php if ($data['errors']['agbs']): ?>
            <div class="error">AGBs wurden nicht akzeptiert!</div>
        <?php endif; ?>
        </input>
        <button type="submit" name="registrieren" value="true">Registrieren</button>
    </form>
</div>