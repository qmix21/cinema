@extends('inc.app')
@section('content')
<div class='container'>
	<div class='row'>
		<div class="column" style="width: 80%">
<h1 style="text-align: center;"> Cinema Guide Listing Web Application</h1>

</div>
</div>


	<div class="container">
			<div class='column'>
				<div class='container card' style="width: 530px">
					<div class='container'>
					<h3>Cinema</h3>
				<div class="row">
					<form method='GET' action='/api/cinemas'>
						<label><b>Get All Cinemas</b></label>
						<button class="btn btn-primary type="Submit" title="http://localhost/api/cinemas">Get Cinemas</button>
					</form>
				</div>
				<hr>
			<div class="row">
				<form id='getCinemaName'>
					<label><b>Get Cinema By Name/ID</b></label>
					<input required type="text" id='cinemaName' placeholder="Cinema Name/ID">
					<button class="btn btn-primary type="submit" id="MyBtn" title="http://localhost/api/cinema/{cinema}">Get Cinema</button>
				</form>
			</div>
			<hr>
			<div class="row">
				<form id='getCinemaSessions'>
					<label><b>Get Cinema Sessions</b></label>
					<input required type="text" id='cinemaSessions' placeholder="Cinema Name">
					<button class="btn btn-primary type="submit" id="cinemaSessionBtn" title="http://localhosts/api/cinema/{cinema}">Get Sessions</button>
				</form>
			</div>
			<hr>
			<div class="row">
				<form id='getCinemaSessionsForMovie'>
					<label><b>Get Cinema Sessions By Cinema and Movie</b></label></br>
					<input required type="text" id='cinemaSessionName' placeholder="Cinema Name">
					<input required type="text" id='cinemaMovieName' placeholder="Movie Name">
					<button class="btn btn-primary type="submit" id="CinemaSessionForMovieBtn" title="http://localhost/api/cinema/{cinema}/{movie}">Get Sessions</button>
				</form>
			</div>
			<hr>
				<div class="row">
				<form id='getCinemaSessionsForDate'>
					<label><b>Get Cinema Sessions By Cinema and Date/Time</b></label></br>
					<input required type="text" id='cinemaSessionNameDate' placeholder="Cinema Name">
					<input required type="text" id='cinemaSessionDate' placeholder="19:00:00 / 2018-06-27">
					<button class="btn btn-primary type="submit" id="CinemaSessionForDateBtn" title="http://localhost/api/cinema/{cinema}/sessions/{date}">Get Sessions</button>
				</form>
			</div>
			<hr>
			<div class="row">
				<form id='getCinemaSessionsDateMovie'>
					<label><b>Get Cinema Session By Cinema, Movie and Date/Time</b></label></br>
					<input required type="text" id='cinemaSessionNameDateMovie' placeholder="Cinema Name">
					<input  required type="text" id='cinemaSessionDateMovie' placeholder="19:00:00 / 2018-06-27">
					<input required type="text" id='cinemaSessionMovie' placeholder="Movie Name">

					<button title="http://localhost/api/cinema/{name}/{movie}/{date or time}" class="btn btn-primary type="submit" id="CinemaSessionForDateMovieBtn">Get Sessions</button>
				</form>
			</div>
		</div>
	</div>
	</div>


	<div class='column'>
		<div class='container card'>
			<div class="container">
			<h3>Movie</h3>
			<div class="row">
			<form method='GET' action='/api/movies'>
				<label><b>Get All Movies</b></label>
				<button title="http://localhost/api/movies" type="Submit" class="btn btn-primary">Get Movies</button>
			</form>
			</div>
			<hr>
			<div class="row">
			<form id="getMovieName">
				<label><b>Get Movie By Name/ID</b></label>
				<input required type="text" id='movieName' placeholder="Movie Name/ID">
				<button title="http://localhost/api/movie/{movie}"type="Submit" id="movieBtn"class="btn btn-primary">Get Movie</button>
			</form>
			</div>
			<hr>
			<div class="row">
			<form id="getMovieSession">
				<label><b>Get Sessions for Movie</b></label>
				<input required type="text" id='movieSession' placeholder="Movie Name">
				<button title="http://localhost/api/movie/{movie}/sessions"type="Submit" id="movieSessionBtn"class="btn btn-primary">Get Movie</button>
			</form>
			</div>
		</div>
	</div>
	</div>
</div>
</div>

<!-- the below javascript wouldn't work in an external file , so i had to leave it here :( -->
<script type="text/javascript">

	window.onload=function(){
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

	$('#CinemaSessionForDateMovieBtn').click(function()
	{
	//gets value inside textbox
	var action_src = document.getElementById("cinemaSessionNameDateMovie").value;
	//gets date from inside texbox
	var date = document.getElementById('cinemaSessionDateMovie').value;
	//gets movie from inside textbox
	var movie = document.getElementById('cinemaSessionMovie').value;
	//Saves begining of link
    var urlLink = "http://localhost/api/cinema/";
    //adds input at the end of the api link
    urlLink = urlLink + action_src +"/"+movie+"/"+ date;
	//alert(urlLink); This was for testing purposes
	//set Action to urlLink
    document.getElementById('getCinemaSessionsDateMovie').action = urlLink;
	});
};
</script>
@endsection