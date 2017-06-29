<?php
require 'inc/db.php';
if(isset($_SESSION['name']))
{
    header('Location: forum.php');
    $ingelogd = 1;
}else{
    $ingelogd = 0;
}

if(isset($_POST['login'])) {
    $errMsg = '';

    // Get data from FORM
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == '')
        $errMsg = 'Enter username';
    if($password == '')
        $errMsg = 'Enter password';

    if($errMsg == '') {
        try {
            $stmt = $connect->prepare('SELECT id, fullname, username, password, secretpin, avatar FROM gebruikers WHERE username = :username');
            $stmt->execute(array(
                ':username' => $username
            ));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if($data == false){
                $errMsg = "User $username not found.";
            }
            else {
                if($password == $data['password']) {
                    $_SESSION['name'] = $data['fullname'];
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['password'] = $data['password'];
                    $_SESSION['secretpin'] = $data['secretpin'];
                    $_SESSION['avatar'] = $data['avatar'];

                    header('Location: forum.php');
                    exit;
                }
                else
                    $errMsg = 'Password not match.';
            }
        }
        catch(PDOException $e) {
            $errMsg = $e->getMessage();
        }
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'forumlogin')
    $forumlogin = '
<div class="col-9-12">
        <div class="middentest">
<div style="color:#FF0000;text-align:center;font-size:18px;">U moet ingelogd zijn om het forum te bekijken!</div>
</div>
</div>
';
?>
<?php include "inc/head.php" ?>
<?php include "inc/menu.php" ?>
<?php include "inc/headerfoto.php" ?>
<?php include "inc/zeivak3.php" ?>



<?php
if(isset($forumlogin)){
    echo $forumlogin;
}
?>
    <div class="col-9-12">
        <div class="middentest">
            <h1>Login op MotocrossForum</h1>
            <form method="post" name="login">
                <input type="text" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>"  autocomplete="off" placeholder="Gebruikersnaam of Email" />
                <input type="password" name="password"  value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" autocomplete="off" placeholder="Wachtwoord" />
                <?php
                if(isset($errMsg)){
                    echo '<div style="color:#FF0000;text-align:center;font-size:18px;">'.$errMsg.'</div>';
                }
                ?>

                <input type="submit" name='login' class='submit' value="Login">
            </form>
</div>
</div>


<?php include "inc/footer.php" ?>




</body>

</html>
