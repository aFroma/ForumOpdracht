<div class="grid grid-pad">
    <div class="col-3-12">

        <div class="form-style-6">
            <h1>Welkom <?php echo $_SESSION['name']; ?>!</h1>
            Leuk dat u bent ingelogd!<br><br>
            <img onerror="this.src='images/no_avatar.jpg'" width="200" height="200" src="<?php echo $_SESSION['avatar']; ?>"/> <br>
            <a href="loguit.php">Loguit</a>
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

