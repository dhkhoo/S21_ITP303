if(localStorage.location != null) {
	$.ajax({
	method: "GET",
	// the endpoint
	url: "https://api.weatherbit.io/v2.0/current?city=" + localStorage.location +"&country=US&state=California&units=I&key=KEY",
	})
	.done(function(results) {
		// when a response is recieved this code runs
		displayResults(results);

	})
	.fail(function() {
		// when an error is received, this function runs
		console.log("ERROR");
	});
} else {
	$.ajax({
	method: "GET",
	// the endpoint
	url: "https://api.weatherbit.io/v2.0/current?city=Los%20Angeles&country=US&state=California&units=I&key=KEY",
	})
	.done(function(results) {
		// when a response is recieved this code runs
		displayResults(results);

	})
	.fail(function() {
		// when an error is received, this function runs
		console.log("ERROR");
	});
}



$(function() {
	$("#weather-id").trigger("change");
	
	$("#weather-id").change(function() {
		var data = $(this).val();

		$.ajax({
			method: "GET",
			// the endpoint
			url: "https://api.weatherbit.io/v2.0/current?city=" + data + "&country=US&state=California&units=I&key=KEY",
		})
		.done(function(results) {
			localStorage.location = data;
			// when a response is recieved this code runs
			//console.log(results);
			displayResults(results);

		})
		.fail(function() {
			// when an error is received, this function runs
			console.log("ERROR");
		});
	})

});


function displayResults(results) {
	$("select#weather-id").val(results.data[0].city_name);
	$(".weather").html(" " + results.data[0].temp + "° " + results.data[0].weather.description + ". Feels Like " + results.data[0].app_temp + "°");
}

$(".task-list").on("click",".box", function() {
	$(this).parent("li").fadeOut(1000, function() {
		$(this).parent("li").remove();
	})
});

$(".task-list").on("click",".task-text", function() {
	if($(this).hasClass("strikeout")) {
		$(this).removeClass("strikeout grey");
		$(this).prev(".box").removeClass("grey");
		//console.log("removing strikeout");
	} else {
		//console.log("adding strikeout");
		$(this).addClass("strikeout grey");
		$(this).prev(".box").addClass("grey");
	}
});

$("#tasks").submit(function(event) {
	event.preventDefault();
	if($("#todo-id").val()) {
		$(".task-list").append("<li><span class='box'><i class='far fa-square'></i></span> <span class='task-text'> " + $("#todo-id").val() + "</span></li>");
		$("#tasks").trigger("reset");
	}

	

	
});

$(".symbol").on("click", function() {
	if($("form").hasClass("hidden")) {
		$("form").removeClass("hidden");
		$("form").fadeOut("slow");
	} else {
		$("form").addClass("hidden");
		$("form").fadeIn("slow");
	}
	
});