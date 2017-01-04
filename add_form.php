
<style type="text/css">
#dis{
	display:none;
}
</style>




    <div id="dis">
    <!-- here message will be displayed -->
	</div>


	 <form method='post' id='diary-SaveForm' action="#">

    <table class='table table-bordered'>

        <tr>
            <td>標題</td>
            <td><input type='text' name='title' class='form-control' placeholder='例：無題' required /></td>
        </tr>

        <tr>
            <td>內文</td>
            <td><input type='text' name='article' class='form-control' placeholder='例：今天什麼也沒做' required></td>
        </tr>

        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save">
    		<span class="glyphicon glyphicon-plus"></span>儲存日記
			</button>
            </td>
        </tr>

    </table>
</form>
