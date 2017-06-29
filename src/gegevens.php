<?php
require 'inc/db.php';
if(empty($_SESSION['name']))
{
    header('Location: login.php');
    $ingelogd = 0;
}else{
    $ingelogd = 1;
}

if(isset($_POST['updateNaam'])) {
    $errMsg = '';

    // Getting data from FROM
    $fullname = $_POST['fullname'];


    if($errMsg == '') {
        try {
            $sql = "UPDATE gebruikers SET fullname = :fullname WHERE username = :username";
            $stmt = $connect->prepare($sql);
            $stmt->execute(array(
                ':fullname' => $fullname,
                ':username' => $_SESSION['username']
            ));
            header('Location: gegevens.php?action=updated');
            exit;

        }
        catch(PDOException $e) {
            $errMsg = $e->getMessage();
        }
    }
}
if(isset($_POST['updateWW'])) {
    $errMsg = '';

    // Getting data from FROM
    $secretpin = $_POST['secretpin'];
    $password = $_POST['password'];
    $passwordVarify = $_POST['passwordVarify'];

    if($password != $passwordVarify)
        $errMsg = 'Password not matched.';

    if($errMsg == '') {
        try {
            $sql = "UPDATE gebruikers SET  password = :password, secretpin = :secretpin WHERE username = :username";
            $stmt = $connect->prepare($sql);
            $stmt->execute(array(
                ':secretpin' => $secretpin,
                ':password' => $password,
                ':username' => $_SESSION['username']
            ));
            header('Location: gegevens.php?action=updated');
            exit;

        }
        catch(PDOException $e) {
            $errMsg = $e->getMessage();
        }
    }
}
if(isset($_POST['updateAvatar'])) {
    $errMsg = '';

    // Getting data from FROM
    $avatar = $_POST['avatar'];

    if($errMsg == '') {
        try {
            $sql = "UPDATE gebruikers SET avatar = :avatar WHERE username = :username";
            $stmt = $connect->prepare($sql);
            $stmt->execute(array(
                ':avatar' => $avatar,
                ':username' => $_SESSION['username']
            ));
            header('Location: gegevens.php?action=updated');
            exit;

        }
        catch(PDOException $e) {
            $errMsg = $e->getMessage();
        }
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'updated')
    $errMsg = 'Successfully updated. <a href="loguit.php">Logout</a> and login to see update.';

if(isset($_GET['action']) && $_GET['action'] == 'wachtwoord')
    $wachtwoord = '
    
<div class="col-9-12">
    <div class="middentest">
        <h1>Wachtwoord Aanpassen</h1>
Wachtwoord <br>
        <input type="password" name="password" value="'.$_SESSION['password'].'" class="box" /><br/><br />
					Herhaal Wachtwoord <br>
					<input type="password" name="passwordVarify" value="'.$_SESSION['password'].'" class="box" /><br/>
</div>
</div>
<div class="col-9-12">
    <div class="middentest">
        <h1>Geheime Pincode</h1>

       	<input type="text" name="secretpin" value="'.$_SESSION['secretpin'].'" autocomplete="off" class="box"/><br /><br />

</div>
</div>
<div class="col-9-12">
    <div class="middentest">
       <input type="submit" name=\'updateWW\' value="Update" class=\'submit\'/>
    </div>
</div>
    ';


if(isset($_GET['action']) && $_GET['action'] == 'avatar')
    $avatar = '
    
<div class="col-9-12">
    <div class="middentest">
        <h1>Avatar Aanpassen</h1>

        <div align="center"><img onerror="this.src=\'images/no_avatar.jpg\'" width="200" height="200" src="'.$_SESSION['avatar'].'"/> <br>
        <input type="text" name="avatar" value="'.$_SESSION['avatar'].'" class="box" />
    </div>
</div>
</div>
<div class="col-9-12">
    <div class="middentest">
       <input type="submit" name=\'updateAvatar\' value="Update" class=\'submit\'/>
    </div>
</div>
    ';

if(isset($_GET['action']) && $_GET['action'] == 'volledigeNaam')
    $volledigeNaam = '
    
<div class="col-9-12">
    <div class="middentest">
        <h1>Volledige Naam Aanpassen</h1>

        <input type="text" name="fullname" value="'.$_SESSION['name'].'" autocomplete="off" class="box"/>
    </div>
</div>

<div class="col-9-12">
    <div class="middentest">
       <input type="submit" name=\'updateNaam\' value="Update" class=\'submit\'/>
    </div>
</div>
    ';
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
if(isset($volledigeNaam)){
    echo $volledigeNaam;
}
?>
<?php
if(isset($avatar)){
    echo $avatar;
}
?>
<?php
if(isset($wachtwoord)){
    echo $wachtwoord;
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


