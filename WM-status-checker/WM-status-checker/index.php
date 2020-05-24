<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
	<style>
	
	#logo{
		width:150px;
	}
	body{
		position:relative;
		background-image:url("images/hdbackg1.jpg");
		background-size:cover;
	}
	#zero{
		margin-top:160px;
	}
	#leftbar{
	
	float:left;
	width:200px;
	background-color:#5a5a5a;
	height:100%;
	}
	#one{
		background-image:url("images/bg2.jpg");
		background-size:cover;
		background-position:relative;
		background-top:-30px;
		font-family:helvetica;
		color:white;
	}
	.learn-more-div{
		color:white;
		background-color:#5a5a5a;
		border-radius:20px;
		padding:10px;
		width:30%;
		position:relative;
		left:35%;
	}
	.carousel-sm{
		width:40%;
		margin-left:30%;
	}
	</style>
  </head>
  <body data-spy="scroll" data-target="#navbar-example" data-offset="70">
    <nav id="navbar-example" class="navbar navbar-expand-lg navbar-dark bg-dark navbar-inverse fixed-top">
  <a class="navbar-brand" href="#"><img id="logo" src="images/codesword_logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#one">Link</a>
      </li>
	  <li class="nav-item">
       <a class="nav-link" href="aboutus.html">About us</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="Team.html">Team</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact us</a>
      </li>
     
 
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div id="zero"></div>
<div id="one" class="jumbotron text-center ">
  <h1 class="display-4">Hello,</h1><br>
  <h3 class="display-5">washingmachine@iiit.ac.in</h3><br>
    <h1 class="display-4">here!</h1><br>
  <p class="lead">Save your time and know the washing machine status here</p>
  <hr class="my-2">
  <p>
  <button class="btn btn-primary btn-lg" type="button" data-toggle="collapse" data-target="#learn-more" aria-expanded="false" aria-controls="collapseExample">
    Learn more
  </button>
</p>
<div class="collapse" id="learn-more">
 <a href="MachineStatus.php"><div class="btn btn-success btn-sm">
 Check status
 </div></a>
</div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script>
	
	$(".learn-more-div").hover(
	function(){
		$(this).css({"width":"40%"});
		$(this).css({"left":"30%"});
	},
	function(){
	
		$(this).css({"width":"30%"});
		$(this).css({"left":"35%"});
	}
	);
	$('.carousel').carousel({
  interval: 2000
})
	</script>
  
  </body>
</html>