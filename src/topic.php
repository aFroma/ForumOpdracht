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

$topic = $forums->topicData($_GET['id']);
$reply = $forums->replyData($_GET['id']);
?>
<?php include "inc/head.php" ?>
<?php include "inc/menu.php" ?>
<?php include "inc/headerfoto.php" ?>
<?php include "inc/zeivak1.php" ?>




		<?php
		if(empty($_GET['id']) === true)
		{
			$errors[] = 'Error: Dit forum bestaat niet! ';
		}
		else
		{
			if (count($topic['id']) == 0)
			{
				$errors[] = 'Error: Topic is niet gevonden. Klik <a href="forum.php">hier</a> om terug te gaan naar het forum.';
			}

			if(empty($errors) === true)
			{
				$starter = $topic['starter'];
				$title = $topic['title'];
				$message = $topic['message'];
				$created = $topic['created'];
				echo '
<div class="col-9-12">
	<div class="middentest">
		<h1>'.$title.'</h1>

<p><strong>'.$title.'</strong> - <span style="font-size:8pt;"><i>Posted by '.$starter.'</i></span><br />'.$message.'</p>
	</div>
</div>

';

				$i = 0;
				foreach ($reply as $replies)
				{
					++$i;
					$reply_username = $replies['username'];
					$reply_message = $replies['message'];
					$created = $replies['created'];
					$whatforum = $replies['forum'];
					echo '
					<div class="col-9-12">
	<div STYLE="height: 150px;" class="middentest">
		<h1>Reactie '.$i.' geplaatst door  ' .$reply_username. '</h1>
				<img STYLE="float: left; padding-left: 10px; padding-right: 10px;" onerror="this.src=\'images/no_avatar.jpg\'" width="100" height="100" src="<?php echo $_SESSION[\'avatar\']; ?>"/>
				' .$reply_message. '<br /><br /></div></div>';
				}

				echo '
<div class="col-9-12">
	<div class="middentest">
		<h1>Plaats een reactie</h1>


<br /><div><strong>Typ hieronder uw bericht:</strong><form method="POST"> <input readonly type="hidden" value="'. $_SESSION['name'] .' " name="username"><br /><br /><textarea name="message"  placeholder="Typ hier uw bericht!" cols="40" rows="4"></textarea>
<br /><input type="hidden" name="topicid" value="'.htmlspecialchars($_GET['id'],ENT_QUOTES).'"><input type="submit" name="submit" value="Plaats reactie!"></form></div>

</div></div>';

			}

		}

		if (isset($_POST['submit']))
		{
			//submitting the reply.
			if (empty($_POST['message']) || empty($_POST['username']) === true)
			{
				$errors[] = 'Error: Je moet alle velden invullen om een reactie te plaatsen.';
			}
			else
			{

				$message = htmlentities($_POST['message']);
				$username = htmlentities($_POST['username']);
				$topicid = htmlentities($_POST['topicid']);
				$whatforum = htmlentities($topic['forum']);
				$created = date('Y-m-d H:i:s');
				$insert_reply = $forums->addReply($message,$username,$topicid,$whatforum,$created);
				$forumpost_update = $forums->updatelastPost($username,$whatforum);
				$topicreply_update = $forums->updatelastReply($username,$topicid);
				echo 'U heeft een reactie geplaatst!';
			}

		}


		if (empty($errors) === false)
		{
			echo ' <div class="col-9-12">
	<div class="middentest">
		<h1>Error!</h1>
		'.implode($errors).' </div></div>';
		}
		?>


<?php include "inc/footer.php" ?>




</body>

</html>

