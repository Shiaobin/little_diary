<?php
include_once 'dbconfig.php';

if($_GET['edit_time'])
{
	$time = $_GET['edit_time'];
	$stmt=$db_con->prepare("SELECT * FROM posts WHERE time=:time");
	$stmt->execute(array(':time'=>$time));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
}

?>
<style type="text/css">
#dis{
	display:none;
}
</style>




    <div id="dis">

	</div>


	 <form method='post' id='diary-UpdateForm' action='#'>

    <table class='table table-bordered'>
 		<input type='hidden' name='time' value='<?php echo $row['time']; ?>' />
        <tr>
            <td>標題</td>
            <td><input type='text' name='title' maxlength='20' class='form-control' value='<?php echo $row['title']; ?>' required></td>
        </tr>

        <tr>
            <td>內文</td>
            <td><input type='text' name='article' maxlength='100' class='form-control' value='<?php echo $row['article']; ?>' required></td>
        </tr>

        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-update" id="btn-update">
    		<span class="glyphicon glyphicon-plus"></span>儲存修改
			</button>
            </td>
        </tr>

    </table>
</form>
