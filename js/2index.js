$(document).ready(function(){
	$("#sel").append("<label>Выберите страну</label><select name='country' id='country'></select><br /><br />");
	$("#sel").append("<div id='hide'><label id='s_change'>Выберите город</label><select name='sity' id='sity'></select></div>");
	$("#hide").hide();
	$.getJSON("https://raw.githubusercontent.com/David-Haim/CountriesToCitiesJSON/master/countriesToCities.json", function(data){
		$.each(data, function (key, elem){
			$("#sel select[name='country']").append("<option>"+key+"</option>");
		});

		$("select[name='country']").change(function(){
			$("#hide").show();
			$('#sity').empty();					
			$.each(data[$("select[name='country']").val()], function(i, values){
				$("#sel select[name='sity']").append("<option>"+values+"</option>");
			})		
		});

		$("select[name='sity']").change(function(){
			$('#weather').empty();
			$('#title').empty();
			var a = $("select[name='sity']").val();
			$.getJSON("https://query.yahooapis.com/v1/public/yql", {q: "select * from weather.forecast where woeid in (select woeid from geo.places(1) where text='"+a+"') and u='c'", format: "json"}, function(data){

					console.log(data);
					console.log(data.query.results.channel.item.title);

				$("#sel").append("<div id='weather'><p>"+data.query.results.channel.item.title+"</p>"+data.query.results.channel.item.description+"</div>");
    		})
		})
	});
})