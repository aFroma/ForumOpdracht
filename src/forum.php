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

require 'config.php'; //our script which begins the forum & database connection.

$forum_main = $forums->getForum();
$topics = $forums->getTopics($_GET['forum']);


//check to see if any forum boards exist yet.
if (count($forum_main) == 0)
{
	die('No forums created yet');
}

if (empty($_GET['forum']))
{
?>
<?php include "inc/head.php" ?>
<?php include "inc/menu.php" ?>
<?php include "inc/headerfoto.php" ?>
<?php include "inc/zeivak1.php" ?>



<div class="col-9-12">
	<div class="middentest">
		<h1>MotocrossForum.nl</h1>

		<table class="tg" style="undefined;table-layout: fixed; width: 100%px">
			<colgroup>
				<col style="width: 51px">
				<col style="width: 100%">
				<col style="width: 70px">
				<col style="width: 86px">
			</colgroup>

			<?php
			$color = 1;
			$vak = th;
			foreach ($forum_main as $forum)
			{
				if ($color % 2 != 0)
					$trColor = "#efefef";
				else
					$trColor = "#FFFFFF";
				if ($color % 2 != 0)
					$vak1 = "th";
				else
					$vak1 = "td";
				$forum_name = $forum['name']; //name
				$forum_desc = $forum['description']; //description
				$forumid = $forum['id'];
				$lastpost = $forum['lastpost'];
				$totaltopics = $forums->totalTopics($forumid);
				$totalreplies = $forums->totalReplies($forumid);

				echo '<tr><'.$vak1.' style="background-color:'.$trColor.';" class="tg-yzt1"><img src="images/board.png"/></'.$vak1.'>
                    <'.$vak1.' style="background-color:'.$trColor.';" class="tg-yzt1">
                        <div class="categorietitel"><a href="forum.php?forum='.$forumid.'">' .$forum_name . '</a></div>
                        <br><div class="ondertekstt"><a href="forum.php?forum='.$forumid.'">' . $forum_desc . '</a></div>
                    </'.$vak1.'>
                    <'.$vak1.'  style="background-color:'.$trColor.';" class="tg-yzt1"><div class="postvak"> '.$totalreplies.' Posts<br>
                            '.$totaltopics.' Topics</'.$vak1.'></div>
        <'.$vak1.'  style="background-color:'.$trColor.';" class="tg-yzt1"><div class="postvak">Laatste post door ' .$lastpost. '</div></'.$vak1.'></tr> ';
				++$color;
			} //end foreach()

			} //end if()


			if ($_GET['forum'])
			{
				?>

			<?php include "inc/head.php" ?>
			<?php include "inc/menu.php" ?>
			<?php include "inc/headerfoto.php" ?>
			<?php include "inc/zeivak1.php" ?>



			<div class="col-9-12">
				<div class="middentest">
					<h1>MotocrossForum.nl</h1>
					<?php
					if (count($topics) == 0)
					{
						echo '<p>No topics have been found under the '.htmlspecialchars($_GET['forum'],ENT_QUOTES).'</a> forum.</p>';
						echo '<br /><br /><a href="addtopic.php?forum='.htmlspecialchars($_GET['forum'],ENT_QUOTES).'">Add Topic</a>';
						die();
					}
					else
					{
					?>

					<!--        <tr>-->
					<!--            <td class="tg-yw4l"><img src="images/board.png"/></td>-->
					<!--            <td class="tg-yw4l">-->
					<!--                <div class="categorietitel">Algemeen Forum</div>-->
					<!--                <br><div class="ondertekstt">voor onderwerpen die niet in de onderstaande categorien thuishoren.</div>-->
					<!--            </td>-->
					<!--            <td class="tg-yw4l"><div class="postvak"> 1 Post<br>-->
					<!--                    1 Topic</div></td>-->
					<!--            <td class="tg-yw4l"><div class="postvak">Laatste post door {memberid} op {date}</div></td>-->
					<!--        </tr>-->
					<style type="text/css">
						.tg  {border-collapse:collapse;border-spacing:0;}
						tr{font-family:Arial, sans-serif;font-size:14px;padding:10px 3px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
						.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 3px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
						.tg .tg-yzt1{background-color:#efefef;vertical-align:top}
						.tg .tg-amwm{font-weight:bold;text-align:center;vertical-align:top}
						.tg .tg-yw4l{vertical-align:top}
					</style>
					<table class="tg" style="undefined;table-layout: fixed; width: 100%">
						<colgroup>
							<col style="width: 60%">
							<col style="width: 15%">
							<col style="width: 10%">
							<col style="width: 15%">
						</colgroup>
						<tr>
							<th class="tg-amwm">Titel</th>
							<th class="tg-amwm">Gemaakt door<br></th>
							<th class="tg-amwm">Reacties<br><br></th>
							<th class="tg-amwm">Laatste<br>Reactie<br></th>
						</tr>


						<?php
					$color = 1;
					foreach ($topics as $topic)
					{
						if ($color % 2 != 0)
							$trColor = "#CCCCCC";
						else
							$trColor = "#FFFFFF";
						$topic_id = $topic['id']; //id of topic.
						$topic_title = $topic['title']; //topic title.
						$topic_starter = $topic['starter']; //topic starter.
						$topic_lastpost = $topic['lastpost']; //last replied user
						$totalposts = $forums->totalReplies2($topic_id);
						if ($topic['sticky'] == '1')
						{
							$sticky = 'STICKY';
						}
						else
						{
							$sticky = '';
						}
						echo '
					
						
						
			<tr style="background-color:'.$trColor.';"><td>'.$sticky.'<a href="topic.php?id='.$topic_id.'">' .$topic_title .  ' </td><td><img onerror="this.src=\'images/no_avatar.jpg\'" width="30" height="30" src="444"/> '.$topic_starter.'</td><td>'.$totalposts.'</td><td>Last post by '.$topic_lastpost.'</td>';
						++$color;
					} //end foreach()

					echo '</tr></table>';
					echo '<br /><a href="addtopic.php?forum='.htmlspecialchars($_GET['forum'],ENT_QUOTES).'">Post new topic</a> - <a href="forum.php">Forum Main</a>';

					} //end else()

					} //end if()

					?>



					</table>

				</div>
		</table>
	</div>
</div>


<?php include "inc/footer.php" ?>




</body>

</html>
