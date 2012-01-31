$(function() {
//******************************************************************************


//******************************************************************************  
	$(window).load (function () {
	  SetMenuStatus ();
  });
//******************************************************************************


//******************************************************************************
	function SetMenuStatus () {
	  var o = $(".GruppenMenuEintrag").next("div");
		 
		while (o.length > 0)
		{ 		
			if (o.attr ("class").toLowerCase() == "GruppenMenuUntereintrag".toLowerCase())
			{
				var reg     = new RegExp ("Gruppenmenu\\-" + o.attr ("id") + "=(\\w+)");
				var display = reg.exec (document.cookie);
				
				if (display != null)
					o.css ("display", display[1]);
				else 
				  o.css ("display", "block");
			}
			else if (o.attr ("class").toLowerCase() == "GruppenMenuEintrag".toLowerCase())
			  o.css ("display", "block");
			
			o = o.next("div");
		}
	}
//******************************************************************************


//******************************************************************************
	$(".GruppenMenuUntereintrag").click(function()
	{
		window.location.href = window.location.pathname + "?phase_id=" + $(this).get(0).id;
	});
//******************************************************************************


//******************************************************************************
	$(".GruppenMenuEintrag").click(function()
	{
		var display = $(this).css ("display");
		var id      = $(this).get(0).id;
		var o       = $(this).next("div");
		var setdisplay;
		
		if (o.length > 0) 
		{
			while (o.length > 0 && o.attr ("class").toLowerCase() == "GruppenMenuUntereintrag".toLowerCase())
			{
				setdisplay = (o.css ("display") != "none") ? "none" : display;
				o.css ("display", setdisplay);	
					
				document.cookie = "Gruppenmenu-" + o.attr ("id") + "=" + setdisplay;
					
				o = o.next("div");
			}
		}
		else
		  window.location.href = window.location.pathname + "?phase_id=" + id; 
	});
//******************************************************************************


//******************************************************************************
	$(".UserTipps").click(function(e)
	{
		$.ajax (
		{
			url: "usertipps.php?id=" + $(this).attr ("name"),
			success: function(data, textStatus, jqXHR)
			         {
								 document.all.usertipps.innerHTML = data;
							 }
		});
	});
//******************************************************************************


//******************************************************************************
  $("input[type=text]").keyup(function (){
	  var s = $(this).attr ("value");
	  var n = parseInt (s);
		
	  if ((s != n || n < 0 || n > 99) && s.length != 0)
	    $(this).css ("background-color", "FF0000");
		else 
		  $(this).css ("background-color", "FFFFFF");
	});
//******************************************************************************


//******************************************************************************	
	$(".cancel").click(function(){
	  window.location.href=window.location.href;
	});
});

