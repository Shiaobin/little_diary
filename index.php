<?php
session_start();

if(!isset($_SESSION['authed']))
{
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>小小日記本</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link href="assets/datatables.min.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="assets/jquery-1.11.3-jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){

	$("#btn-view").hide();

	$("#btn-add").click(function(){
		$(".content-loader").fadeOut('slow', function()
		{
			$(".content-loader").fadeIn('slow');
			$(".content-loader").load('add_form.php');
			$("#btn-add").hide();
			$("#btn-view").show();
		});
	});

	$("#btn-view").click(function(){

		$("body").fadeOut('slow', function()
		{
			$("body").load('index.php');
			$("body").fadeIn('slow');
			window.location.href="index.php";
		});
	});

});
</script>

</head>

<body>



	<div class="container">

        <h2 class="form-signin-heading">小小日記本
        <button class="btn btn-info" type="button" id="btn-add"> <span class="glyphicon glyphicon-pencil"></span> &nbsp; 寫日記</button>
        <button class="btn btn-info" type="button" id="btn-view"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; 看日記</button>
		<a href="logout.php" class="btn btn-info"><span class="glyphicon glyphicon-log-out"></span>&nbsp;登出</a>
		</h2>

        <div class="content-loader">

        <table cellspacing="0" width="100%" id="diary" class="table table-striped table-hover table-responsive">
        <thead>
        <tr>
        <th>時間</th>
        <th>標題</th>
        <th>內文</th>
        <th>編輯</th>
        <th>刪除</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once 'dbconfig.php';

        $stmt = $db_con->prepare("SELECT * FROM posts ORDER BY time DESC");
        $stmt->execute();
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<tr>
			<td><?php echo $row['time']; ?></td>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo $row['article']; ?></td>
			<td align="center">
			<a id="<?php echo $row['time']; ?>" class="edit-link" href="#" title="Edit">
			<img src="edit.png" width="20px" />
            </a></td>
			<td align="center"><a id="<?php echo $row['time']; ?>" class="delete-link" href="#" title="Delete">
			<img src="delete.png" width="20px" />
            </a></td>
			</tr>
			<?php
		}
		?>
        </tbody>
        </table>

        </div>

    </div>

    <br />

<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/datatables.min.js"></script>
<script type="text/javascript" src="crud.js"></script>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#diary').DataTable( {
        "order": [[ 0, "desc" ]]
    } );

	$('#diary')
	.removeClass( 'display' )
	.addClass('table table-bordered');
});
</script>
</body>
</html>
