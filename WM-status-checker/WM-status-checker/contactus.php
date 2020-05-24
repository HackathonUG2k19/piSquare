<?php
    error_reporting(E_ALL);
    $fail = 1;
    $error = ""; $successMessage = "";
    if ($_POST) {
        if (!$_POST["email"]) {
            
            $error .= "An email address is required.<br>";
            
        }
        
        if (!$_POST["content"]) {
            
            $error .= "The content field is required.<br>";
            
        }
        
        if (!$_POST["subject"]) {
            
            $error .= "The subject is required.<br>";
            
        }
        
        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            
            $error .= "The email address is invalid.<br>";
            
        }
        
        if ($error != "") {
            
            $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
            
        } 
        else {
            
            $emailTo = "shaantanu@gmail.com";
            $subject = $_POST['subject'];
            
            $content = $_POST['content'];
            
            $headers = "From: ".$_POST['email'];
            $selfmail=$_POST['email'];
            
              // mail($emailTo, $subject, $content, $headers)
                if (!mail($emailTo, $subject, $content, $headers)) {
                    
                    $fail=0;
                } 
                if(!mail($selfmail, $subject, $content, $headers))
                {
                    $fail=0;
                }
            }
            if($fail==1)
            {
                $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, we\'ll get back to you ASAP!</div>';
            }
            else
            {
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Your message couldn\'t be sent - please try again later</div>';

            }
        
        
        
        }
    

?>
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
		background-image:url("images/bg2.jpg");
		background-size:cover;
	}
	#zero{
		margin-top:200px;
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
	.form-back{
	    border-radius:20px;
	    background-color:#c3fdb8;
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


 <div class="container form-back">
      
    <h1>Get in touch!</h1>
      
      <div id="error"><? echo $error.$successMessage; ?></div>
      
      <form method="post">
  <fieldset class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    <small class="text-muted">We'll never share your email with anyone else. We will also send you a copy .</small>
  </fieldset>
  <fieldset class="form-group">
    <label for="subject">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject" >
  </fieldset>
  <fieldset class="form-group">
    <label for="content">What would you like to ask us?</label>
    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
  </fieldset>
  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
          
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
$("form").submit(function(e) {
              
              var error = "";
              
              if ($("#email").val() == "") {
                  
                  error += "The email field is required.<br>"
                  
              }
              
              if ($("#subject").val() == "") {
                  
                  error += "The subject field is required.<br>"
                  
              }
              
              if ($("#content").val() == "") {
                  
                  error += "The content field is required.<br>"
                  
              }
              
              if (error != "") {
                  
                 $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
                  
                  return false;
                  
              } else {
                  
                  return true;
                  
              }
          })
          
	</script>
  
  </body>
</html>