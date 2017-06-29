<!-- Grid 2/3 and 1/3-->
<div class="grid grid-pad">
    <div class="col-1-1">

        <div class="menu">
            <?php
            if(empty($_SESSION['name']))
            {
                echo '| <a href="index.php">Home</a> | <a href="registreer.php">Maak een account</a> | <a href="login.php">Login op het forum</a> |';
            }else{
                echo '| <a href="forum.php">Home</a> | <a href="gegevens.php">Gegevens aanpassen</a> | <a href="loguit.php">Uitloggen</a> |';

            }
            ?>        </div>
    </div>
</div>