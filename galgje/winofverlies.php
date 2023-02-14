<!DOCTYPE html>
<?php
session_start();
$images["fouten"] = array("galgstapp0.png", "galgstapp1.png", "galgstapp2.png", "galgstapp3.png", 
"galgstapp4.png", "galgstapp5.png", "galgstapp6.png", "galgstapp7.png", "galgstapp8.png", "galgstapp9.png", "galgstapp10.png", "galgstapp11.png",);
?>
<html lang="en">

<head>
    <title><?php echo $_SESSION['winofverlies'] ?></title>
</head>

<body>
    <div class="body2">
        <?php
        if (isset($_SESSION['gewonnenofverloren'])) {
            echo $_SESSION['gewonnenofverloren'];
            echo ' [ ';
            foreach ($_SESSION["woordinstukken"] as $key) {
                echo $key;
            }
            echo ' ] is het woord';
        } else {
            header('location: index.php');
        }
        if (isset($_POST['terug'])) {
            header('location: index.php');
        }
        ?>
        <form method="post">
            <input type="submit" value="terug?" name="terug">
        </form>
    </div>
    <img src="<?php
    if (isset($_SESSION['hitler'])) {
        echo $images["fouten"][$_SESSION['hitler']];
    } else {
        echo "wit.png";
    }

    ?>" alt="<?php
if (isset($_SESSION['hitler'])) {
    echo 'foutfoto ' . $_SESSION['hitler'];
} else {
    echo 'foutfoto 0';
}
?>">
</body>

</html>