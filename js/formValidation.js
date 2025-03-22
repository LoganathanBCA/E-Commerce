$(document).ready(function(){


	/* Enter Text and White Space Only */
	$(".txtOnly").keypress(function(event){
		var inputVal=event.which;
		if(!(inputVal>=65 && inputVal <=120)&(inputVal!=32 && inputVal!=0))
		{
			event.preventDefault();
		}
	});
	
	//--- Alpha Numeric Only Text -- -
	$(".alphanum").keypress(function(e){
		var regex=new RegExp("^[a-zA-Z0-9]$");
		var str=String.fromCharCode(!e.charCode ?e.which:e.charCode);
		if(regex.test(str))
		{
			return true;
		}
		e.preventDefault();
		return false;
	});
	
	//Email Already Exit Validation
	
	$("#email").keyup(function(){
		var val=$(this).val();
		if(validateEmail(val))
		{
				$.post("chekEmail.php",{ema:val},function(data){
					if(data=="1")
					{
						$(".emailout").html("Email Id Already Taken");
						$(".emailout").css("color","red");
						$("#SaveBtn").hide();
					}
					else if(data="0")
					{
						$(".emailout").html("Email Id Available");
						$(".emailout").css("color","green");
								$("#SaveBtn").show();
							
					}
				});
		}
		else
		{
				$(".emailout").html("Please Enter Valid Email Id");
				$(".emailout").css("color","red");
				$("#SaveBtn").hide();	
				
		}
	});	
	
});

function saveDatas()
{
	alert("yOU caN sAVE");
}

function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}

//Numeric Only

    $(".num").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });