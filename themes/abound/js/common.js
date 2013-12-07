$(function()
{
	$(".navlink").click(function()
	{
		var href=$(this).attr('href');
		ajaxReload(href);
		//$("#cont").html(' ');
		//$("#cont").load(href);
		return false;
	});
});

/*$(function() 
{
$("#frm").submit(function(event)
{
var url=$("#upsurl").val();
var formData = new FormData($(this)[0]);
$.ajax(
{
url :url,
type: "POST",
data : formData,
mimeType:"multipart/form-data",
async: false,
cache: false,
contentType: false,
processData: false,
success:function(response) 
{
alert(response);
$("#song").modal('hide');
},
error: function(jqXHR, textStatus, errorThrown) 
{
alert(errorThrown);
}
});
return false;
});
});
*/
function ajaxReload(surl)
{

$.ajax({
type:'POST',
url:surl.toString(),
success:function(res)
{

$("#cont").html('');
$("#cont").html(res);
}
});
}


function playsongs(str,surl,burl)
{
var datastring='id='+str;
baseurl=burl.toString();
$.ajax({
type:'POST',
url:surl.toString(),
data:datastring,
success:function(res)
{

//var url=baseurl+"/"+res;
var pl='<object data="'+baseurl+'/swf/dewplayer-vol.swf" width="100%" height="45px" name="dewplayer" id="dewplayerjs" type="application/x-shockwave-flash" style="width:100%;margin-bottom:auto" >'+
'<param name="movie" value="'+baseurl+'/swf/dewplayer-vol.swf" />'+
'<param name="flashvars" value="mp3='+res+'&amp;autostart=1&amp;showtime=1&javascript=on" id="file"/>'+
'<param name="wmode" value="transparent" />'+
'</object>';
$("#player").html('');
$("#player").html(pl);
}
});
}
