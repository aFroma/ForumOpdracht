<?php
require 'inc/db.php';
if(isset($_SESSION['name']))
    header('Location: forum.php');

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
error_reporting(0);
/*
* script: forum_main.php
* @developed by gratefulDeadty 2014
*/

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
<?php include "inc/zeivak0.php" ?>



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
                if (count($topics) == 0)
                {
                    echo '<p>No topics have been found under the '.htmlspecialchars($_GET['forum'],ENT_QUOTES).'</a> forum.</p>';
                    echo '<br /><br /><a href="addtopic.php?forum='.htmlspecialchars($_GET['forum'],ENT_QUOTES).'">Add Topic</a>';
                    die();
                }
                else
                {
                    ?>
            <?php include "inc/head.php" ?>
            <?php include "inc/menu.php" ?>
            <?php include "inc/headerfoto.php" ?>
            <?php include "inc/zeivak0.php" ?>



            <div class="col-9-12">
                <div class="middentest">
                    <h1>MotocrossForum.nl</h1>


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

                    <div align="center">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="100"><strong>Forum</strong></td>
                                <td width="200"></td>
                                <td width="50"><strong>Posts</strong></td>
                                <td width="200"><strong>Last Post</strong></td>
                            </tr>
                    </div>

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
                        $totalposts = $forums->totalTopics($topic_id);
                        if ($topic['sticky'] == '1')
                        {
                            $sticky = 'STICKY';
                        }
                        else
                        {
                            $sticky = '';
                        }
                        echo '<tr style="background-color:'.$trColor.';"><td>'.$sticky.'<a href="topic.php?id='.$topic_id.'">' .$topic_title . '</td><td></td><td>'.$totalposts.'</td><td>Last post by '.$topic_lastpost.'</td>';
                        ++$color;
                    } //end foreach()

                    echo '</tr></table>';
                    echo '<br /><a href="addtopic.php?forum='.htmlspecialchars($_GET['forum'],ENT_QUOTES).'">Post new topic</a> - <a href="forum.php">Forum Main</a>';

                } //end else()

            } //end if()

            ?>

    </div>
    </table>
</div>
</div>


<?php include "inc/footer.php" ?>




</body>

</html>
