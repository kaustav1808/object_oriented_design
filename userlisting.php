<?php
include_once "session.php";
include_once "functions/user.php";
if (isset($_POST["delete"])) {
    deleteuser($_POST["delete"]);
}
?>

<?php
if (isset($_GET["page"]) && (!isset($_SESSION["search"]))) {
    $count = getusercount("addby", $_SESSION["id"]);
    $row = limituser("addby", $_SESSION["id"], $_GET["page"]);
}
if (isset($_GET["page"])&&(isset($_POST["search"])||isset($_SESSION["search"]))) {
    if(!isset($_SESSION["search"])||isset($_POST["search"])){
        Session::set_session("search", $_POST["search"]);
    }
    $count = getusercountonsearch("addby", $_SESSION["id"], $_SESSION["search"]);
    $row = limituseronsearch("addby", $_SESSION["id"], $_GET["page"],$_SESSION["search"]);
}
?>
<?php
include_once "head.php";
?>
<link href="css/searchbox.css"
      rel="stylesheet">
<?php
include_once "dashboardtemplate.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    $start = 0;
                    $limit = 2;
                    if(!isset($_GET["msg"])) {
                        for ($i = 1; $start < $count; $start += $limit) {
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="userlisting.php?page=<?php echo $start; ?>"><?php echo $i; ?></a>
                            </li>
                            <?php
                            $i++;
                        }
                        $start -= $limit;
                    }
                    ?>
                </ul>
            </nav>
        </div>
        <div class="col-md-4">
        </div>
        <!-->
        <div class="col-md-4 " style="margin-top: 20px;padding-right: 40px; padding-left: 60px;">
            <input type="text" id="search"  class="form-control" placeholder="Search" name="search">
<!--            <form method="post" action="userlisting.php?page=0">-->
<!--                <div class="input-group input-group-sm">-->
<!--                    <div class="input-group-btn">-->
<!--                        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </form>-->
        </div>
    </div>

    <div class="row">
        <?php if (isset($_GET["msg"])) { ?>
            <div class="alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $_GET["msg"]; ?>
            </div>
        <?php } ?>
        <?php if (isset($_GET["msg2"])) { ?>
            <div class="alert alert-success alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $_GET["msg2"]; ?>
            </div>
        <?php } ?>
    </div>

    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th><a href="#" title="Sort Name">Name</a></th>
                <th><a href="#">User Name</a></th>
                <th>User Image</th>
                <th class="td-actions"></th>
            </tr>
            </thead>
            <tbody>
            <?php while (!empty($row)) {
                $user = array_pop($row);
                ?>
                <tr>
                    <td><?php echo $user["name"]; ?></td>
                    <td><?php echo $user["username"]; ?></td>
                    <td>
                        <image src="profileimage/thumbnail/<?php echo $user["image"]; ?>" class="img-rounded"
                               width="150" height="100"></image>
                    </td>
                    <td class="td-actions">
                        <form action="" method="post">
                            <a href="useredit.php?id=<?php echo $user["id"]; ?>" class="btn btn-lg btn-primary">
                                <i class="btn-icon-only icon-ok"></i>edit
                            </a>
                            <button type="submit" name="delete" value="<?php echo $user["id"]; ?>"
                                    class="btn btn-lg btn-danger">
                                <i class="btn-icon-only icon-ok"></i>delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<?php
include_once "foot.php";
?>
<script>
    $(document).ready(function () {
        $("#search").keypress(function (e) {
            e.preventDefault();
            var URL = "functions/search.php";
            var that = $(this);
            var search_val=$("#search").val();
//            console.log(that);
            //alert(that);
//            var search_val = $("#search").val();
//            console.log($('#search').val());
            $.ajax({
                url: URL,
//                dataType:"json",
//                data: {search_val: search_val },
                type: 'POST',
                error: function () {
                    alert("internal error");
                },
                success: function () {
                    alert("ok");
                }
            });
        });
    });
</script>>
</body>
</html>
