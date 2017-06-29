<?php
require 'inc/db.php';
if(empty($_SESSION['name']))
{
    header('Location: login.php');
    $ingelogd = 0;
}else{
    $ingelogd = 1;
}
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
                <tr>
                    <th class="tg-yzt1"><img src="images/board.png"/></th>
                    <th class="tg-yzt1">
                        <div class="categorietitel">Algemeen Forum</div>
                        <br><div class="ondertekstt">voor onderwerpen die niet in de onderstaande categorien thuishoren.</div>
                    </th>
                    <th class="tg-yzt1"><div class="postvak"> 1 Post<br>
                            1 Topic</th></div>
        <th class="tg-yzt1"><div class="postvak">Laatste post door {memberid} op {date}</div></th>
        </tr>
        <tr>
            <td class="tg-yw4l"><img src="images/board.png"/></td>
            <td class="tg-yw4l">
                <div class="categorietitel">Algemeen Forum</div>
                <br><div class="ondertekstt">voor onderwerpen die niet in de onderstaande categorien thuishoren.</div>
            </td>
            <td class="tg-yw4l"><div class="postvak"> 1 Post<br>
                    1 Topic</div></td>
            <td class="tg-yw4l"><div class="postvak">Laatste post door {memberid} op {date}</div></td>
        </tr>
        <tr>
            <th class="tg-yzt1"><img src="images/board.png"/></th>
            <th class="tg-yzt1">
                <div class="categorietitel">Algemeen Forum</div>
                <br><div class="ondertekstt">voor onderwerpen die niet in de onderstaande categorien thuishoren.</div>
            </th>
            <th class="tg-yzt1"><div class="postvak"> 1 Post<br>
                    1 Topic</th></div>
    <th class="tg-yzt1"><div class="postvak">Laatste post door {memberid} op {date}</div></th>
    </tr>
    <tr>
        <td class="tg-yw4l"><img src="images/board.png"/></td>
        <td class="tg-yw4l">
            <div class="categorietitel">Algemeen Forum</div>
            <br><div class="ondertekstt">voor onderwerpen die niet in de onderstaande categorien thuishoren.</div>
        </td>
        <td class="tg-yw4l"><div class="postvak"> 1 Post<br>
                1 Topic</div></td>
        <td class="tg-yw4l"><div class="postvak">Laatste post door {memberid} op {date}</div></td>
    </tr>
    </table>
</div>
</div>
<div class="col-9-12">
    <div class="middentest">
        <h1>Motocross Marktplaats</h1>
        <table class="tg" style="undefined;table-layout: fixed; width: 100%px">
            <colgroup>
                <col style="width: 51px">
                <col style="width: 100%">
                <col style="width: 70px">
                <col style="width: 86px">
            </colgroup>
            <tr>
                <th class="tg-yzt1"><img src="images/board.png"/></th>
                <th class="tg-yzt1">
                    <div class="categorietitel">Algemeen Forum</div>
                    <br><div class="ondertekstt">voor onderwerpen die niet in de onderstaande categorien thuishoren.</div>
                </th>
                <th class="tg-yzt1"><div class="postvak"> 1 Post<br>
                        1 Topic</th></div>
    <th class="tg-yzt1"><div class="postvak">Laatste post door {memberid} op {date}</div></th>
    </tr>
    <tr>
        <td class="tg-yw4l"><img src="images/board.png"/></td>
        <td class="tg-yw4l">
            <div class="categorietitel">Algemeen Forum</div>
            <br><div class="ondertekstt">voor onderwerpen die niet in de onderstaande categorien thuishoren.</div>
        </td>
        <td class="tg-yw4l"><div class="postvak"> 1 Post<br>
                1 Topic</div></td>
        <td class="tg-yw4l"><div class="postvak">Laatste post door {memberid} op {date}</div></td>
    </tr>
    <tr>
        <th class="tg-yzt1"><img src="images/board.png"/></th>
        <th class="tg-yzt1">
            <div class="categorietitel">Algemeen Forum</div>
            <br><div class="ondertekstt">voor onderwerpen die niet in de onderstaande categorien thuishoren.</div>
        </th>
        <th class="tg-yzt1"><div class="postvak"> 1 Post<br>
                1 Topic</th></div>
<th class="tg-yzt1"><div class="postvak">Laatste post door {memberid} op {date}</div></th>
</tr>
<tr>
    <td class="tg-yw4l"><img src="images/board.png"/></td>
    <td class="tg-yw4l">
        <div class="categorietitel">Algemeen Forum</div>
        <br><div class="ondertekstt">voor onderwerpen die niet in de onderstaande categorien thuishoren.</div>
    </td>
    <td class="tg-yw4l"><div class="postvak"> 1 Post<br>
            1 Topic</div></td>
    <td class="tg-yw4l"><div class="postvak">Laatste post door {memberid} op {date}</div></td>
</tr>
</table>
</div>
</div>
</div>


<?php include "inc/footer.php" ?>

</body>

</html>


