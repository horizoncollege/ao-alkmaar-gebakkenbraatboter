<?php

session_start();
if (isset($_GET['vs'])) {
    if ($_GET['vs'] == 'tegen elkaar') {
        session_unset();
        $_SESSION['aantalteler'] = 2;
    } else {
        session_unset();
        $_SESSION['aantalteler'] = 1;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>steen papier schaar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="img">
        <a href="steenpapierschaar.php?keuze=steen"><img class="imgimg" src="steen.png" alt="steen"></a>
        <a href="steenpapierschaar.php?keuze=papier"><img class="imgimg" src="papier.png" alt="papier"></a>
        <a href="steenpapierschaar.php?keuze=schaar"><img class="imgimg" src="shaar.png" alt="schaar"></a>
    </div>
    <?php
    if ($_SESSION['aantalteler'] == 2) {
        if (isset($_SESSION['keuze speler 1'])) {
            if (isset($_SESSION['keuze speler 2'])) {
            } else {
                if (isset($_GET['keuze'])) {
                    $_SESSION['keuze speler 2'] = $_GET['keuze'];

                    $_SESSION['speler 1 of speler'] = 'speler 1';
                    $_SESSION['speler 2 of computer'] = 'speler 2';
                    header('location: game.php');
                }
            }
        } else {
            if (isset($_GET['keuze'])) {
                $_SESSION['keuze speler 1'] = $_GET['keuze'];
            }
        }
    } else {
        if (isset($_GET['keuze'])) {
            $keuzeuitsteenpapierschaar = array('steen', 'papier', 'schaar', 'papier', 'schaar');
            $sps = array_rand($keuzeuitsteenpapierschaar, 2);
            $_SESSION['keuze speler 2'] = $keuzeuitsteenpapierschaar[$sps[0]];
            $_SESSION['keuze speler 1'] = $_GET['keuze'];

            $_SESSION['speler 1 of speler'] = 'speler';
            $_SESSION['speler 2 of computer'] = 'computer';
            header('location: game.php');
        }
    }
    ?>
</body>

</html>