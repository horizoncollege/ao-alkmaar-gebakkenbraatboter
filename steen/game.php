<?php
session_start();
if (isset($_GET['restartrestart'])) {
    session_unset();
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>game</title>
</head>

<body>
    <p>
        <?php
        if (isset($_SESSION['keuze speler 2'])) {
            $keuzespeler1 = $_SESSION['keuze speler 1'];
            $keuzespeler2 = $_SESSION['keuze speler 2'];
            $v = array($keuzespeler1, $keuzespeler2);
            echo 'speler 1: ' . $_SESSION['keuze speler 1'] . "<br>";
            echo 'speler 2: ' . $_SESSION['keuze speler 2'] . "<br>";
            switch ($keuzespeler1) {
                case 'steen':
                    $_SESSION['keuze1'] = 58;
                    break;
                case 'papier':
                    $_SESSION['keuze1'] = 1;
                    break;
                case 'schaar':
                    $_SESSION['keuze1'] = 61;
                    break;
            }
            switch ($keuzespeler2) {
                case 'steen':
                    $_SESSION['keuze2'] = 58;
                    break;
                case 'papier':
                    $_SESSION['keuze2'] = 1;
                    break;
                case 'schaar':
                    $_SESSION['keuze2'] = 61;
                    break;
            }
            $getal = $_SESSION['keuze1'] + $_SESSION['keuze2'];
            echo "<br>";
            switch ($getal) {
                case '116':
                    echo 'gelijk spel';
                    break;
                case '59':
                    if ($keuzespeler1 == 'papier') {
                        echo $_SESSION['speler 1 of speler'] . ' heeft gewonnen';
                    } else {
                        echo $_SESSION['speler 2 of computer'] . ' heeft gewonnen';
                    }
                    break;
                case '119':
                    if ($keuzespeler1 == 'steen') {
                        echo $_SESSION['speler 1 of speler'] . ' heeft gewonnen';
                    } else {
                        echo $_SESSION['speler 2 of computer'] . ' heeft gewonnen';
                    }
                    break;
                case '62':
                    if ($keuzespeler1 == 'schaar') {
                        echo $_SESSION['speler 1 of speler'] . ' heeft gewonnen';
                    } else {
                        echo $_SESSION['speler 2 of computer'] . ' heeft gewonnen';
                    }
                    break;
                case '2':
                    echo 'gelijk spel';
                    break;
                case '122':
                    echo 'gelijk spel';
                    break;
            }
        } else {
            if (isset($_SESSION['keuze speler 1'])) {
                echo 'speler 1: heeft gekozen' . "<br>";
                echo 'speler 2:';
            } else {
                echo 'speler 1: ';
            }
        }
        ?>
    </p>
    <form method="$_GET">
        <input type="submit" value="restart" name="restartrestart">
    </form>
</body>

</html>