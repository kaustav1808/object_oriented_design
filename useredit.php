<?php
include_once "session.php";
include_once "functions/user.php";
?>
<?php


    if(isset($_GET["id"])){
        $user=getuser("id",$_GET["id"]);
    }
    if(isset($_POST["name"])){
        edituser($_POST,$_FILES);
    }

?>
<?php
include_once "head.php";
include_once "dashboardtemplate.php";
?>

<div class="container">
    <?php if(isset($_GET["msg"])){?>
        <div class="alert alert-danger alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $_GET["msg"]; ?>
        </div>
    <?php } ?>
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>

            <!-- Form Name -->
            <legend>Edit the profile</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Name</label>
                <div class="col-md-4">
                    <input id="textinput" name="name" type="text" value="<?php echo $user[0]['name']; ?>" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">UserName</label>
                <div class="col-md-4">
                    <input id="textinput" name="username" type="email" value="<?php echo $user[0]["username"]; ?>"  class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">New Password</label>
                <div class="col-md-4">
                    <input id="textinput" name="password" type="text" value=""  class="form-control input-md">

                </div>
            </div>

            <!-- File Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="filebutton">upload photo</label>
                <div class="col-md-4">
                    <input id="filebutton" name="image" class="input-file" type="file">
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                <div class="col-md-4">
                    <button type="submit" id="singlebutton" name="edit" value="<?php echo $user[0]["id"]; ?>" class="btn btn-primary">submit</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>
<?php
include_once "foot.php";
?>
</body>
</html>

