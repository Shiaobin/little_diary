// JavaScript Document

$(document).ready(function(){

	/* Data Insert Starts Here */
	$(document).on('submit', '#diary-SaveForm', function() {

	   $.post("create.php", $(this).serialize())
        .done(function(data){
			$("#dis").fadeOut();
			$("#dis").fadeIn('slow', function(){
				 $("#dis").html('<div class="alert alert-info">'+data+'</div>');
			     $("#diary-SaveForm")[0].reset();
		     });
		 });
	     return false;
    });
	/* Data Insert Ends Here */


	/* Data Delete Starts Here */
	$(".delete-link").click(function()
	{
		var time = $(this).attr("id");
		var del_time = time;
		var parent = $(this).parent("td").parent("tr");
		if(confirm('真的要刪除 ' + del_time + ' 嗎？'))
		{
			$.post('delete.php', {'del_time':del_time}, function(data)
			{
				parent.fadeOut('slow');
			});
		}
		return false;
	});
	/* Data Delete Ends Here */

	/* Get Edit Time  */
	$(".edit-link").click(function()
	{
		var time = $(this).attr("id");
		var edit_time = time;
		if(confirm('確定要編輯 ' + edit_time + ' 嗎？'))
		{
			$(".content-loader").fadeOut('slow', function()
			 {
				$(".content-loader").fadeIn('slow');
				$(".content-loader").load('edit_form.php?edit_time=' + encodeURI(edit_time));
				$("#btn-add").hide();
				$("#btn-view").show();
			});
		}
		return false;
	});
	/* Get Edit Time  */

	/* Update Record  */
	$(document).on('submit', '#diary-UpdateForm', function() {

	   $.post("update.php", $(this).serialize())
        .done(function(data){
			$("#dis").fadeOut();
			$("#dis").fadeIn('slow', function(){
			     $("#dis").html('<div class="alert alert-info">'+data+'</div>');
			     $("#diary-UpdateForm")[0].reset();
				 $("body").fadeOut('slow', function()
				 {
					$("body").fadeOut('slow');
					window.location.href="index.php";
				 });
		     });
		});
	    return false;
    });
	/* Update Record  */
});
