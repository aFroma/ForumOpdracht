<?php
require 'inc/db.php';
if(empty($_SESSION['name']))
{
	header('Location: login.php?action=forumlogin');
	$ingelogd = 0;
}else{
	$ingelogd = 1;
}
error_reporting(0);

require 'config.php'; 
?>
<?php include "inc/head.php" ?>
<?php include "inc/menu.php" ?>
<?php include "inc/headerfoto.php" ?>
<?php include "inc/zeivak1.php" ?>
<div class="col-9-12">
	<div class="middentest">
		<h1>Plaats een nieuwe topic!</h1>
<?php
if(empty($_GET['forum']) === true)
{
	$errors[] = 'Error: Forum does not exist.';
}
else
{
	echo '<div><form method="POST">
	<input readonly type="hidden" value="'. $_SESSION['name'] .' " name="username"><br />
	Titel van Topic: <input type="text" name="title"><br />
	Topic bericht: <input type="text" name="message"><br />
	<input type="submit" name="submit" value="Plaats Topic!"></div>';
}

if (isset($_POST['submit']))
{
	if (empty($_POST['username']) || empty($_POST['title']) || empty($_POST['message']))
	{
		$errors[] = 'Error: U moet alle velden invullen.';
	}
	else
	{
		if (empty($errors) === true)
		{
			$username = htmlentities($_POST['username']);
			$title = htmlentities($_POST['title']);
			$message = htmlentities($_POST['message']);
			$whatforum = (int)$_GET['forum'];
                        $created = date('Y-m-d H:i:s');
			$forums->addTopic($username,$title,$message,$whatforum,$created,$postcount);
                        $newtopicid = $connect->lastInsertId();
			echo '<p>Bedankt! Uw topic is succesvol toegevoegd!</p>';
			echo '<br /><a href="forum.php">Terug na het forum</a> <font color="#898989">of klik <a href="topic.php?id='.$newtopicid.'">hier om uw topic te bekijken</a>';
		}
	}
}

//displaying all errors from the $errors[] array.
if (empty($errors) === false)
{ 
	echo ' <font color="red">'.implode($errors).'</font> ';
}
?>
	</div>
</div>


<?php include "inc/footer.php" ?>




</body>

</html>

