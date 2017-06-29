<?php
require 'inc/db.php';
if(isset($_SESSION['name']))
{
    header('Location: forum.php');
    $ingelogd = 1;
}else{
    $ingelogd = 0;
}
if(isset($_POST['register'])) {
    $errMsg = '';

    // Get data from FROM
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $secretpin = $_POST['secretpin'];
    $avatar = $_POST['avatar'];

    if($fullname == '')
        $errMsg = 'Enter your fullname';
    if($username == '')
        $errMsg = 'Enter username';
    if($password == '')
        $errMsg = 'Enter password';
    if($secretpin == '')
        $errMsg = 'Enter a sercret pin number';

    if($errMsg == ''){
        try {
            $stmt = $connect->prepare('INSERT INTO gebruikers (fullname, username, password, secretpin, avatar) VALUES (:fullname, :username, :password, :secretpin, :avatar)');
            $stmt->execute(array(
                ':fullname' => $fullname,
                ':username' => $username,
                ':password' => $password,
                ':secretpin' => $secretpin,
                'avatar' => $avatar
            ));
            header('Location: registreer.php?action=joined');
            exit;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'joined') {
    $errMsg = 'Registration successfull. Now you can <a href="login.php">login</a>';
}
?>
<?php include "inc/head.php" ?>
<?php include "inc/menu.php" ?>
<?php include "inc/headerfoto.php" ?>
<?php include "inc/zeivak3.php" ?>



<form method="post" name="signup">
<div class="col-9-12">
    <div class="middentest">
        <h1>Gebruiker Gegevens: Volledige Naam en Gebruikersnaam</h1>
        <?php
        if(isset($errMsg)){
            echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
        }
        ?>
        <input type="text"  name="fullname" value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname'] ?>" autocomplete="off" placeholder="Voer hier uw volledige naam in" />
        <input type="text" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>"  autocomplete="off" placeholder="Voer hier uw gebruikersnaam in" />
    </div>
</div>
    <div class="col-9-12">
        <div class="middentest">
            <h1>Geheime Gegevens: Wachtwoord en Pincode</h1>
            <input type="password" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" autocomplete="off" placeholder="Voer hier uw wachtwoord in" />
            <input type="text"  name="secretpin" value="<?php if(isset($_POST['secretpin'])) echo $_POST['secretpin'] ?>" autocomplete="off" placeholder="Voer hier een geheime pincode in" />

        </div>
    </div>
    <div class="col-9-12">
        <div class="middentest">
            <h1>Voeg een profiel afbeelding toe. (Niet verplicht)</h1>
            <input type="text"  name="avatar" value="<?php if(isset($_POST['avatar'])) echo $_POST['avatar'] ?>" autocomplete="off" placeholder="Plaats een link naar een afbeelding" />

        </div>
    </div>
<div class="col-9-12">
    <div class="middentest">
        <input type="submit" name='register' value="Maak een account!" class='submit'>
        </form>
</div>
</div>
</div>


<?php include "inc/footer.php" ?>




</body>

</html>
