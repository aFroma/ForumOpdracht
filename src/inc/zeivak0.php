<div class="grid grid-pad">
    <div class="col-3-12">

        <div class="form-style-6">
            <h1>Login</h1>
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
        <div class="form-style-6">
            <h1>Mail ons</h1>
            <form>
                <input type="text" name="field1" placeholder="Your Name" />
                <input type="email" name="field2" placeholder="Email Address" />
                <textarea name="field3" placeholder="Type your Message"></textarea>
                <input type="submit" value="Send" />
            </form>
        </div>
        <div class="form-style-6">
            <a class="twitter-timeline" data-height="400" href="https://twitter.com/mxplanet">Tweets by mxplanet</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>        </div>
    </div>