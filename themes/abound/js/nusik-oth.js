$(function()
{
	$(".listlink").click(function()
	{
		var href=$(this).attr('href');
		ajaxReloads(href);
		//$("#cont").html(' ');
		//$("#cont").load(href);
		return false;
	});
});

function ajaxReloads(surl)
{

$.ajax({
type:'POST',
url:surl.toString(),
success:function(res)
{

$("#profile-data").html('');
$("#profile-data").html(res);
}
});
}
