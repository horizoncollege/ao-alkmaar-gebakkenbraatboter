<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>startpagina</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="indexminibody">
        <form method="post" action="galgje.php">
            <p>gamemodus</p>
            <input type="submit" value="willekeurig" name="m">
            <p></p>
        </form>
        <form method="post" action="galgje.php">
            <div class="form">
                <input type="text" value="zelf kiezen" name="zelfkiezen" required>
                <p></p>
                <input type="submit" value="zelf een woord gekozen?" name="m">
                <p></p>
            </div>
            <p><?php
            if (isset($_SESSION['een game is nog bezig'])) {
                echo $_SESSION['een game is nog bezig'];
            }
            ?></p>
            <input type="submit" value="reset de vorige game" name="sessionreset">
        </form>
    </div>
</body>

</html>