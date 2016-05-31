$(function(){
	var showwel = function()
	{
		$("#welmsg").slideDown("slow");
	}
	setTimeout(showwel,100);
	$("#btsubmit").click(function(){
		//$(this).hide("1000");
        $(this).attr('disabled','disabled');
        $("#form").submit();
	});

})