<?php
include_once "session.php";
include_once "head.php";
?>
    <link href="css/login.css"
          rel="stylesheet">
    <script src="https://use.typekit.net/ayg4pcz.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

</head>
<body>
    <div class="container">
        <h1 class="welcome text-center">Welcome to Codelogicx</h1>
        <div class="card card-container">
            <h2 class='login_title text-center'>Login</h2>
            <hr>

            <form class="form-signin" action="functions/login.php" method="post">
                <?php
                if(isset($_GET["msg"])){?>
                    <div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p><?php echo $_GET["msg"]; ?></p>
                    </div>
                <?php } ?>
                <span id="reauth-email" class="reauth-email"></span>
                <p class="input_title">Email</p>
                <input type="email" id="inputEmail" class="login_box" placeholder="user@Codelogicx.com" title="max 30 character" name="email" required autofocus>
                <p class="input_title">Password</p>
                <input type="password" id="inputPassword" name="password" class="login_box" placeholder="******" required>
                <small>(**password must be numeric or alphabet)</small>
                <br>
                <small>(**no any special character is allowed)</small>
                <button class="btn btn-lg btn-primary" type="submit">Login</button>
                <a class="btn btn-lg btn-primary" href="registration.php">Signup</a>

                <div id="remember" class="checkbox">
                    <label>

                    </label>
                </div>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
<?php
include_once  "foot.php";
?>
</body>
</html>

