<?php
include_once "session.php";
include_once "head.php" ?>
<link href="css/registration.css"
      rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container-fluid">

    <form action="functions/registration.php" method="post" class="register-form" enctype="multipart/form-data">
        <?php
        if(isset($_GET["msg"])){?>
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p><?php echo $_GET["msg"]; ?></p>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <h1 style="text-align: center;">You are 1 step away</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="firstName">NAME</label>
                <input name="name" class="form-control" type="text" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="email">EMAIL</label>
                <input name="email" class="form-control" type="email" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="password">PASSWORD</label>
                <input name="password" class="form-control" type="password" required >
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="image">PROFILE IMAGE</label>
                <input name="image" class="form-control" type="file" required>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                <button class="btn btn-default regbutton">Register</button>

            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                <a href="index.php" class="btn btn-default logbutton style="padding-top:10px"">Login</a>
            </div>
        </div>
    </form>
</div>

<?php include_once "foot.php"?>
</body>
</html>