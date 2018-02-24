<?php
include_once "session.php";
  include_once "head.php";
  include_once "dashboardtemplate.php";
  ?>
<?php if(isset($_GET["msg"])){?>
    <div class="alert alert-danger alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $_GET["msg"]; ?>
    </div>
<?php } ?>
<?php
  include_once "foot.php";
?>
</body>
</html>

