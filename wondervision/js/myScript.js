jQuery(document).ready(function($){

	var timeID=0;


	if($("div.text > p").length>0)
	{
	$("div.text > p").css("display","none");
	$("div.text > p:first").fadeIn(2000).css("display","block").addClass("nowShowing");
	timeID=setInterval('textRotate()',2000);
	}

	$("div.text").mouseenter(function(){
		clearInterval(timeID);
	});

	$("div.text").mouseleave(function(){
		timeID=setInterval('textRotate()',2000);
	});



});

	function textRotate()
	{


		var items=$("div.text > .nowShowing");

		if(items.length<3)
		{

			if($("div.text > .nowShowing:last").next().length>0)
			{

			items.next().fadeIn(2000).css("display","block").addClass("nowShowing");	
			}
			else
			{

			$("div.text > p.nowShowing").each(function(){
				$(this).slideUp("2000").removeClass("nowShowing");
			});

			$("div.text > p:first").fadeIn(2000).css("display","block").addClass("nowShowing");	
			}


		}
		else
		{

			$("div.text > p.nowShowing:first").slideUp("2000").removeClass("nowShowing");

		}

	}