// the page when first loading
let loadedEndpoint = "https://api.themoviedb.org/3/movie/now_playing?api_key=KEY&language=en-US&page=1";
ajax(loadedEndpoint, displayResults);

let testingEndpoint = "https://api.themoviedb.org/3/genre/movie/list?api_key=KEY&language=en-US";
ajax(loadedEndpoint, show);

function show(results) {
	let converted = JSON.parse(results);
	console.log(converted);
}

function displayResults(results) {


	// Clear previous results
	let moviesList = document.querySelector(".movies");
	while(moviesList.hasChildNodes()) {
		moviesList.removeChild(moviesList.lastChild);
	}


	let convertedResults = JSON.parse(results);
	console.log(convertedResults);
	document.querySelector("#currently").innerHTML = convertedResults.results.length;
	document.querySelector("#total").innerHTML = convertedResults.total_results;


	for(let i = 0; i < convertedResults.results.length; i++) {
		//create div: col class
		let colDiv = document.createElement("div");
		colDiv.classList.add("col");

			//create div: card class
			let cardDiv = document.createElement("div");
			cardDiv.classList.add("card");

				//create img tag : card-img class, src, alt
				let image = document.createElement("img");
				image.classList.add("card-img");

				if(convertedResults.results[i].poster_path == null) {
					image.src="Image-Not-Available.png";
					image.alt = "Image not available";
				} 
				else {
					image.src = "https://image.tmdb.org/t/p/w500/" + convertedResults.results[i].poster_path; 
					image.alt = convertedResults.results[i].title;
				}
				
				//create div: card-img-overlay
					//create p tag, class: card-text rate
					//create p tag, class: card-text voters
					//create p tag, class: card-text synopsis
				let overlayDiv = document.createElement("div");
				overlayDiv.classList.add("card-img-overlay");

					let pRate = document.createElement("p");
					pRate.classList.add("card-text");
					pRate.innerHTML = "Rating: " + convertedResults.results[i].vote_average;

					let pVoters = document.createElement("p");
					pVoters.classList.add("card-text");
					pVoters.innerHTML = convertedResults.results[i].vote_count + " Votes";

					let pSynopsis = document.createElement("p");
					pSynopsis.classList.add("card-text");
					if(convertedResults.results[i].overview.length > 200) {
						pSynopsis.innerHTML = convertedResults.results[i].overview.substring(0, 200) + "...";
					} else {
						pSynopsis.innerHTML = convertedResults.results[i].overview;
					}
					

			//create div: info class
				//create p tag, name class
				//create p tag, release class
			let infoDiv = document.createElement("div");
			infoDiv.classList.add("info");
				let pName = document.createElement("p");
				pName.innerHTML = convertedResults.results[i].title;
				
				let pRelease = document.createElement("p");
				pRelease.innerHTML = convertedResults.results[i].release_date;


		overlayDiv.appendChild(pRate);
		overlayDiv.appendChild(pVoters);
		overlayDiv.appendChild(pSynopsis);

		cardDiv.appendChild(image);
		cardDiv.appendChild(overlayDiv);

		infoDiv.appendChild(pName);
		infoDiv.appendChild(pRelease);

		colDiv.appendChild(cardDiv);
		colDiv.appendChild(infoDiv);

		moviesList.appendChild(colDiv);

	}
}


function ajax(endpoint, returnFunction) {
	let httpRequest = new XMLHttpRequest();
	httpRequest.open("GET", endpoint);
	httpRequest.send();

	httpRequest.onreadystatechange = function() {

		// readyState == 4 when we have a full response
		if(httpRequest.readyState == 4) {

			// Check if we got a success or error
			if(httpRequest.status == 200) {
				returnFunction(httpRequest.responseText);
			}
			else {
				console.log("Failed Request");
				console.log(httpRequest.status);
			}

		}

	}
}

// When user submits the search form
document.querySelector("#search-form").onsubmit = function(event) {
	event.preventDefault();
	console.log("Submitted!");

	let userInput = document.querySelector("#search").value.trim();
	let endpoint = "https://api.themoviedb.org/3/search/movie?api_key=KEY&language=en-US&query=" + userInput + "&page=1&include_adult=false";
	
	ajax(endpoint, displayResults);
}

