$(document).ready(function(){
	//Function for #MyBtn
	$('#MyBtn').click(function()
	{
	//gets value inside textput
	var action_src = document.getElementById("cinemaName").value;
	//Saves begining of link
    var urlLink = "http://localhost/api/cinema/";
    //adds input at the end of the api link
    urlLink = urlLink + action_src;
	//alert(urlLink); This was for testing purposes
	//set Action to urlLink
    document.getElementById('getCinemaName').action = urlLink;
	});

	//function for movieBtn
	$('#movieBtn').click(function()
	{
	//gets value inside textput
	var action_src = document.getElementById("movieName").value;
	//Saves begining of link
    var urlLink = "http://localhost/api/movie/";
    //adds input at the end of the api link
    urlLink = urlLink + action_src;
	//alert(urlLink); This was for testing purposes
	//set Action to urlLink
    document.getElementById('getMovieName').action = urlLink;
	});
	
	//function for cinemaSessionBtn
	$('#cinemaSessionBtn').click(function()
	{
	//gets value inside textput
	var action_src = document.getElementById("cinemaSessions").value;
	//Saves begining of link
    var urlLink = "http://localhost/api/cinema/";
    //adds input at the end of the api link
    urlLink = urlLink + action_src + "/sessions";
	//alert(urlLink); This was for testing purposes
	//set Action to urlLink
    document.getElementById('getCinemaSessions').action = urlLink;
	});

	//function for movieSessionBtn
	$('#movieSessionBtn').click(function()
	{
	//gets value inside textput
	var action_src = document.getElementById("movieSession").value;
	//Saves begining of link
    var urlLink = "http://localhost/api/movie/";
    //adds input at the end of the api link
    urlLink = urlLink + action_src + "/sessions";
	//alert(urlLink); This was for testing purposes
	//set Action to urlLink
    document.getElementById('getMovieSession').action = urlLink;
	});


		//function for CinemaSessionForMovieBtn
	$('#CinemaSessionForMovieBtn').click(function()
	{
	//gets value inside textbox
	var action_src = document.getElementById("cinemaSessionName").value;
	//gets movie from inside texbox
	var movie = document.getElementById('cinemaMovieName').value;
	//Saves begining of link
    var urlLink = "http://localhost/api/cinema/";
    //adds input at the end of the api link
    urlLink = urlLink + action_src +"/"+ movie;
	//alert(urlLink); This was for testing purposes
	//set Action to urlLink
    document.getElementById('getCinemaSessionsForMovie').action = urlLink;
	});


		//function for CinemaSessionForDateBtn
	$('#CinemaSessionForDateBtn').click(function()
	{
	//gets value inside textbox
	var action_src = document.getElementById("cinemaSessionNameDate").value;
	//gets movie from inside texbox
	var date = document.getElementById('cinemaSessionDate').value;
	//Saves begining of link
    var urlLink = "http://localhost/api/cinema/";
    //adds input at the end of the api link
    urlLink = urlLink + action_src +"/sessions/"+ date;
	//alert(urlLink); This was for testing purposes
	//set Action to urlLink
    document.getElementById('getCinemaSessionsForDate').action = urlLink;
	});
});