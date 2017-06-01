$(document).ready(function(){
	var $a = $("#a");
	var $b = $("#b");
	var $a2 = $("#a2");
	var $b2 = $("#b2");
	var $caps = $("#upper");
	var $dcaps = $("#dupper");
	var $phones;

	//калькулятор
	$("#plus").click(function(){
		$("#res").val(+$a.val() + +$b.val());
	})

	$("#minus").click(function(){
		$("#res").val(+$a.val() - +$b.val());
	})

	$("#divide").click(function(){
		$("#res").val(+$a.val() * +$b.val());
	})

	$("#multiply").click(function(){
		$("#res").val(+$a.val() / +$b.val());
	})

	//увеличение по кнопке
	$("#upperbot").click(function(){
		 $("#upper").val($caps.val().toUpperCase());
	})
	//увеличение без кнопки
	$("#dupper").keydown(function(){
		$("#dupper").val($dcaps.val().toUpperCase());
  	})
	//показ пароля
	$("#pwdview").change(function(){
		if ($('#pwd').get(0).type=='password') {
			$('#pwd').get(0).type='text';
			} else {
			 $('#pwd').get(0).type='password';
			}
	})
	//калькулятор 2
	$("#plus2").change(function(){
		$("#res2").val(+$a2.val() + +$b2.val());
		// alert("huy");
	})

	$("#minus2").change(function(){
		$("#res2").val(+$a2.val() - +$b2.val());
	})

	$("#divide2").change(function(){
		$("#res2").val(+$a2.val() * +$b2.val());
	})

	$("#multiply2").change(function(){
		$("#res2").val(+$a2.val() / +$b2.val());
	})

	//телефоны
	$("#addPhone").click(function(){
		if (isNaN($('#inputs input:last').attr("name"))) {
			$name = 1;
		} else {
			$name = +$('#inputs input:last').attr("name") + 1;
		}        
        $('#inputs').append('<input id="phone" name="'+$name+'" /> <br /> <br />');
	})


	$("#getPhone").click(function(){      
        // $('#inputs').append('<input id="phone" name="ph-'+$name+'" /> <br /> <br />');
        var $arr = $("input:text[# = phone]").serialize().split('&');
        var $array = [];
        for (var b = $i = 0; $i < $arr.length; $i++) {
        	var $az = $arr[$i].split('=');
        	$array.push($az);
        }
        alert($array);
	})
})