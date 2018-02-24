<?php
include_once "session.php";
include_once "functions/user.php";
?>
<?php
  if(isset($_POST["addby"])){
      adduser($_POST,$_FILES);
  }
?>
<?php
include_once "head.php";
include_once "dashboardtemplate.php";
?>

<div class="container">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>

            <!-- Form Name -->
            <legend>Add a User</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Name</label>
                <div class="col-md-4">
                    <input id="textinput" name="name" type="text" placeholder="john smith"  class="form-control input-md" required>

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">UserName</label>
                <div class="col-md-4">
                    <input id="textinput" name="username" type="email" placeholder="example@email.com"  class="form-control input-md" required>

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">New Password</label>
                <div class="col-md-4">
                    <input id="textinput" name="password" type="password" placeholder="******" class="form-control input-md" required>

                </div>
                <small>(**password must be numeric or alphabet)</small>
                <br>
                <small>(**no any special character is allowed)</small>
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
                    <button type="submit" id="singlebutton" name="addby" value="<?php echo $_SESSION["id"]; ?>" class="btn btn-primary">submit</button>
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
