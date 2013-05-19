<?php contain("class", "units") ?>
<form action="" method="GET" name="input">
    <table border="1">
        <tr>
            <td>Truppen:</td>
            <?php foreach ($units as $unit): ?>
                <td><?= $unit->name; ?></td>
            <?php endforeach; ?>
            <td>Boni</td>
            <td>Grundverteidigung</td>
        </tr>
        <tr>
            <td>Off:</td>
            <td><input type="text" name="off_sta" /></td>
            <td><input type="text" name="off_stw" /></td>
            <td><input type="text" name="off_spt" /></td>
            <td><input type="text" name="off_spw" /></td>
            <td><input type="text" name="off_ks" /></td>
            <td><input type="text" name="off_bonus" value="1"></td>
        </tr>
        <tr>
            <td>Deff:</td>
            <td><input type="text" name="deff_sta" /></td>
            <td><input type="text" name="deff_stw" /></td>
            <td><input type="text" name="deff_spt" /></td>
            <td><input type="text" name="deff_spw" /></td>
            <td><input type="text" name="deff_ks" /></td>
            <td><input type="text" name="deff_bonus" value="1"></td>
            <td><input type="text" name="deff_basic" /></td>
        </tr>
    </table>
    <button input="submit" name="ausrechnen" value="true">Berechnen</button>
    <button input="reset" name="resetten" value="true">Zur&uuml;cksetzen</button>
</form>
