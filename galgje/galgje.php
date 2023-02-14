<?php

session_start();
$images["fouten"] = array(
    "galgstapp0.png", "galgstapp1.png", "galgstapp2.png", "galgstapp3.png",
    "galgstapp4.png", "galgstapp5.png", "galgstapp6.png", "galgstapp7.png", "galgstapp8.png", "galgstapp9.png", "galgstapp10.png", "galgstapp11.png",
);
$_SESSION['goed'] = 0;
$_SESSION['fout'] = 0;
$_SESSION['een game is nog bezig'] = 'een game is nog bezig';
$_SESSION[" "] = " ";
$_SESSION["-"] = "-";
if (isset($_POST["inputtext"])) {
    $letter = $_POST["inputtext"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>galgje</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php

$rendomwoord = array(
    "wereld", "ertensoep", "arbeidsongeschiktheidsverzekering", "school", "huiswerk", "water", "lang", "kort", "wereldkaart", "eten",
    "klaslokaal", "nederland", "zuid-nederland", "uiteten", "koolstofmonoxide", "nikkel", "koolstofdioxide", "zout", "peper", "snert"
);
?>

<body class="body2">
    <div class="mainbody">
        <p><?php

        if (isset($_SESSION["letters"])) {
        } else {
            $gamemodus = $_POST['m'];
        }
        ?></p>
        <h1></h1>
        <?php

        if (isset($_SESSION["letters"])) {
        } else {
            switch ($gamemodus) {
                case 'willekeurig':
                    $gamemodustext = 'je speeldt met een willekeurig woord' . "<br>";
                    $hetwoord = array_rand($rendomwoord, 2);
                    $woord = $rendomwoord[$hetwoord[0]];
                    break;
                case 'zelf een woord gekozen?':
                    $woordchekker = $_POST['zelfkiezen'];
                    $string = str_replace(' ', '', $woordchekker);
                    $array1 = str_split($string);
                    array_push($array1, "n");
                    if (count($array1) >= 2) {
                        $gamemodustext = 'je speeld met een zelf gekozen woord' . "<br>";
                        $woord = $_POST['zelfkiezen'];
                    } else {
                        $gamemodustext = 'je heb zelf geen woord gekozen dus hebben maar automaties willekeurig gedaan' . "<br>";
                        $hetwoord = array_rand($rendomwoord, 2);
                        $woord = $rendomwoord[$hetwoord[0]];
                    }
                    break;
            }
            $antalleters = str_replace(' ', '', $woord);
            $antalletersinarray = str_split($antalleters);
            $totalantalleterinarray = array_unique($antalletersinarray);
            $_SESSION["totalantalleterinarray"] = $totalantalleterinarray;
            $_SESSION["letters"] = $antalletersinarray;
            $_SESSION["gamemodustext"] = $gamemodustext;
            $_SESSION["woordinstukken"] = str_split($woord);
        }

        echo $_SESSION["gamemodustext"];

        echo "<br>";
        ?>
        <p></p>
        <table>
            <?php

            if (isset($_POST['verstuur'])) {
                foreach ($_SESSION["woordinstukken"] as $key) {
                    if (array_key_exists($key, $_SESSION)) {
                        if ($key == ' ') {
                            echo " - ";
                        }
                        echo $_SESSION[$key];
                    } else {
                        if ($key == ' ') {
                            echo ' - ';
                        } else {
                            if ($key == $letter) {
                                echo $letter;
                                $_SESSION[$key] = $letter;
                                if (isset($_SESSION['antelgoed'])) {
                                    unset($array);
                                    $array = $_SESSION['antelgoed'];
                                    unset($_SESSION['antelgoed']);
                                    $array = $array + 1;
                                    $_SESSION['antelgoed'] = $array;
                                    $_SESSION['1goed'] = 1;
                                } else {
                                    $array = 1;
                                    $_SESSION['antelgoed'] = $array;
                                    $_SESSION['1goed'] = 1;
                                }
                            } else {
                                echo ' _ ';
                            }
                        }
                    }
                }
            } else {
                foreach ($_SESSION["woordinstukken"] as $key) {
                    if ($key == ' ') {
                        echo ' - ';
                    } else {
                        echo ' _ ';
                    }
                }
            }
            if (isset($_POST['verstuur'])) {
                if (isset($_SESSION[$letter])) {
                    if ($_SESSION[$letter] == $letter) {
                        unset($_SESSION['1goed']);
                    } else {
                        if (isset($_SESSION['1goed'])) {
                            unset($_SESSION['1goed']);
                        } else {
                            if (isset($_SESSION['antelfout'])) {
                                unset($arrayf);
                                $arrayf = $_SESSION['antelfout'];
                                unset($_SESSION['antelfout']);
                                array_push($arrayf, $letter);
                                $_SESSION['antelfout'] = $arrayf;
                                $_SESSION[$letter] = $letter;
                            } else {
                                $arrayf = array($letter);
                                $_SESSION[$letter] = $letter;
                                $_SESSION['antelfout'] = $arrayf;
                            }
                        }
                    }
                } else {
                    if (isset($_SESSION['1goed'])) {
                        unset($_SESSION['1goed']);
                    } else {
                        if (isset($_SESSION['antelfout'])) {
                            unset($arrayf);
                            $arrayf = $_SESSION['antelfout'];
                            unset($_SESSION['antelfout']);
                            array_push($arrayf, $letter);
                            $_SESSION['antelfout'] = $arrayf;
                            $_SESSION[$letter] = $letter;
                        } else {
                            $arrayf = array($letter);
                            $_SESSION[$letter] = $letter;
                            $_SESSION['antelfout'] = $arrayf;
                        }
                    }
                }
            }
            ?>
        </table>
        <?php

        if (isset($_POST['sessionreset'])) {
            session_unset();
            header('location: index.php');
        }
        ?>
        <form method="post">
            <label>voer een letter in</label>
            <input type="text" name="inputtext" required>
            <input type="submit" value="letter in gevuld?" name="verstuur">
        </form>
        <form method="post">
            <p></p>
            <input type="submit" value="reset" name="sessionreset">
        </form>
        <?php

        if (isset($_SESSION['antelfout'])) {
            echo 'antal fouten letters ' . count($_SESSION['antelfout']) . "<br>";
            foreach ($_SESSION['antelfout'] as $v) {
                echo $v . ' ';
            }
            echo "<br>";
        }
        if (isset($_SESSION['antelfout'])) {
            $foutteler = count($_SESSION['antelfout']) - 1;
        }
        if (isset($letter)) {
            echo 'je hebt net de letter ' . $letter . ' ingevuld';
        }
        ?>
    </div>
    <img src="<?php
    if (isset($foutteler)) {
        echo $images["fouten"][$foutteler];
    } else {
        echo "wit.png";
    }

    ?>" alt="<?php
if (isset($foutteler)) {
    echo 'foutfoto ' . $foutteler;
} else {
    echo 'foutfoto 0';
}
?>">
    <?php
    if (isset($_SESSION['antelgoed'])) {
        if (count($_SESSION["totalantalleterinarray"]) == $_SESSION['antelgoed']) {
            $_SESSION['winofverlies'] = 'win';
            $_SESSION['gewonnenofverloren'] = 'je hebt gewonnen ';
            $_SESSION['hitler'] = $foutteler;
            header('location: winofverlies.php');
        }
    }
    if (isset($_SESSION['antelfout'])) {
        if (count($_SESSION['antelfout']) == 12) {
            $_SESSION['winofverlies'] = 'verloren';
            $_SESSION['gewonnenofverloren'] = 'je hebt verloren ';
            $_SESSION['hitler'] = $foutteler;
            header('location: winofverlies.php');
        }
    }
    ?>
</body>

</html>