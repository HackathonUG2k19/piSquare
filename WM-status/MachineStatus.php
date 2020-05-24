<?php

    $message="";
    $statusmessage="";
    error_reporting(E_ALL);
    $now_time = time();
   // echo $now_time."<br>";
    $link = mysqli_connect("shareddb-q.hosting.stackcp.net","WM-status-313137bae9","l5mrwedg30","WM-status-313137bae9");
    if(mysqli_connect_error())
    {
       die("couldn't connect to database");
    }
    else
    {
        $index=0;
        $query = "SELECT * FROM machinestatus";
        $result=mysqli_query($link,$query);
     
      // $query = "SELECT * FROM machinestatus";
       if($result)
       {
           //echo "success";
           $index =1;
           $result=mysqli_query($link,$query);
             
             while($row = mysqli_fetch_array($result) )
             {
                 $index=$row[0];
                 $status=$row[1];
                 $prev_time=$row[3];
                 $isworking = $row[4];
                 $delta_time=$now_time-$prev_time;
                 if($isworking)
                 {
                     if($status)
                     {
                         $updatequery = "UPDATE `machinestatus` SET `timesince` = $delta_time WHERE machinenumber = $index";
                         mysqli_query($link,$updatequery); 
                     }
                     $timespan=$row[2];
                     if($timespan>2400)
                     {
                         $updatequery = "UPDATE `machinestatus` SET `timesince` = 0 WHERE machinenumber = $index";
                         mysqli_query($link,$updatequery); 
                         $updatequery = "UPDATE `machinestatus` SET `status` = 0 WHERE machinenumber = $index";
                         mysqli_query($link,$updatequery);  
                     }
                     $status=$row[1];
                     
                     if($status)
                     {
                         $minutes = floor($timespan/60);
                         $seconds = $timespan%60 ;
                         //echo "in pos";
                        $statusmessage.= "<br>Machine no :".$index."  is Busy and time since start is ".$minutes." mins  ".$seconds." seconds";
                     }
                     else
                     {
                       //  echo "in neg";
                          $statusmessage.="<br>Machine no :".$index."  is Free";
                     }
                 }
                 else
                 {
                     $statusmessage.="<br> Machine no :".$index." is not working";
                 }
             }
       
       }
        else
        {
            echo "error";
        }
    }
    if($_POST)
    {
        $now_time=time();
        $index=$_POST['machineid'];
        $query = "SELECT * FROM machinestatus WHERE machinenumber = $index ";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_array($result);
        $isworking=$row[4];
        if($isworking)
        {
            if($row[1]==1)
            {
                $message = "<br>This machine is busy<br>";
            }
            else
            {
                $updatequery = "UPDATE `machinestatus` SET `status` = 1 WHERE machinenumber = $index";
                 mysqli_query($link,$updatequery);
                 $updatequery = "UPDATE `machinestatus` SET `start_time` = $now_time WHERE machinenumber = $index";
                mysqli_query($link,$updatequery);
                $message="<br> status updated<br>";
                
            }
        }
        else
        {
            $message = "<br> The machine is not working , choose a valid machine which has the potential to clean your clothes";
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
	    background-color:#ebf4fa;
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

<div id="error" class=" container alert alert-primary" role="alert"><h1>Machine Status</h1><br><? echo $statusmessage; ?></div>
<div id="error" class=" container alert alert-success"><? echo $message; ?></div>

<div class="container">
  <button class="btn btn-primary btn-lg" type="button" data-toggle="collapse" data-target="#learn-more" aria-expanded="false" aria-controls="collapseExample">
   Use A Machine
  </button>
</p>
</div>
 <div class="container form-back">
<div class="collapse" id="learn-more">

    

 <form method="POST">
  <fieldset class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="personname" placeholder="type your name here">
  </fieldset>
  <fieldset class="form-group">
      <label for="machineid">Machine Number</label>
      <br>
    <input type="number" list="quantities" id="machineid" name="machineid">
<datalist id="quantities">
  <option value="1">
  <option value="2">
      <option value="3">
      <option value="4">    
</datalist>
    </fieldset>

  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>

<div id="zero"></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	
  </body>
</html>
