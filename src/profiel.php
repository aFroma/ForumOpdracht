<?php
require 'inc/db.php';
if(empty($_SESSION['name']))
{
    header('Location: login.php');
    $ingelogd = 0;
}else{
    $ingelogd = 1;
}



if(isset($_GET['id'])) {
    $id = $_GET['id'];





    $Arjen = '
    
<div class="col-9-12">
    <div class="middentest">
        <h1>Wachtwoord Aanpassen</h1>
'.$id.' '.$row['fullname'].'
    </div>
</div>
    ';
}

//if(isset($_GET['username'])) {
//    $username = $_GET['username'];
//}
?>
<?php include "inc/head.php" ?>
<?php include "inc/menu.php" ?>
<?php include "inc/headerfoto.php" ?>
<?php include "inc/zeivak1.php" ?>
<?php
if(isset($errMsg)){
    echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
}
?>

<div class="col-9-12">
    <div class="middentest">
        <h1>Gegevens Aanpassen</h1>

        <div align="center"> <a href="?action=volledigeNaam" class="menuButton">Volledige Naam</a> <a href="?action=avatar" class="menuButton">Avatar Aanpassen</a> <a href="?action=wachtwoord" class="menuButton">Wachtwoord Aanpassen</a>
        </div>
    </div>
</div>
<form action="" method="post">
    <?php
    if(isset($id)){
        echo $Arjen;
    }
    ?>
    <?php
    function getFruit($connect) {
    $sql = 'SELECT fullname FROM gebruikers WHERE username = "$id"';
    foreach ($connect->query($sql) as $row) {
    print $row['fullname'] . "\t";
    }
    }
    ?>



</form>

<!--<div class="col-9-12">-->
<!--    <div class="middentest">-->
<!--        <h1>Gegevens aanpassen</h1>-->
<!---->
<!--        Poep-->
<!--    </div>-->
<!--</div>-->



<?php include "inc/footer.php" ?>

</body>

</html>


