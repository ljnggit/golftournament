<?php
  /**
   * about.php is the "About/Information" section
   * start the session so we can access our session variables that are active in the session
   */
  session_start();


  /**
   * If the session variable 'id' exists, check if it equals 1 (logged in as admin) to make sure the admin link on the navbar is visible, if not set it to hidden
   */
  if(isset($_SESSION['id'])) {
    if($_SESSION['id'] == 1){
      $_SESSION['adminHide'] = '';
    }else{
      $_SESSION['adminHide'] = 'hidden';
    }
  } else {
    $_SESSION['adminHide'] = 'hidden';
  }
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset ="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/style.css">
		<title>DEVELOPMENT - Dan Segin Golf Tournament Website</title>
    <link rel="icon" href="images/ddsm-logo.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">


		
	</head>	
	<body>
    <div class="aboutPage">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.php"><img
                src="images/ddsm-logo.png"
                alt="ddsm-logo"
                width="100"
                height="50"/></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="registration.php">Registration <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="donate.php">Donate</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="photos.php">Photos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="sponsors.php">Sponsors</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="store.php">Store</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php">About</a>
                </li>
                <?php 
                  /**
                   * If the session variable is empty then the navlink for admin will show, if it is set to hidden it will be set to hidden in css and not show
                   */
                  echo '<li class="nav-item">';
                  echo  '<a '.$_SESSION['adminHide'].' class="nav-link" href="admin.php">Admin</a>';
                  echo '</li>';
                ?>
              </ul>
            </div>
          </nav>
    
        <!-- SLIDE SHOW -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="images/aboutPagePic1.png" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="images/aboutPagePic2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="images/aboutPagePic3.png" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>


        <div class="row mt-5">
            <div class="col-6">
                <h2 class="aboutPageContentHeader"> Signs of a Heart Attack </h2>
                <hr>
                <div class="aboutPageContentText">
                    <ul>
                      <li class='customAboutPageList'>Chest discomfort, pressure, squeezing, fullness or pain, burning or heaviness</li>
                      <li  class='customAboutPageList'>Sweating</li>
                      <li  class='customAboutPageList'>Upper body discomfort. Neck, jaw, shoulder, arms or back</li>
                      <li  class='customAboutPageList'>Nausea</li>
                      <li  class='customAboutPageList'>Shortness of breath</li>
                      <li  class='customAboutPageList'>Light-headedness</li>
                    </ul>
                  </div>
            </div>
            <div class="col-6">
                <img 
                src="images/examplePicture1.png"      
                width="100%"/>
            </div>
        </div>

        <div class="row mt-5">

            <div class="col-6">
                <img 
                src="images/cheque.png"      
                width="90%"/>
            </div>
            <div class="col-6">
                <h2 class="aboutPageContentHeader">The Tournament </h2>
                <hr>
                <p class="aboutPageContentText"> The tournament we host today originated from the Segin family wanting to do something to honour the memory of their Father, Brother, Grandfather and Great Grandfather, Dan D Segin, who passed from a Heart attack due to complications from a broken hip in 2013. The event started with modest expectations, and snowballed into an event that exceeded expectations each and every year. In 2019, the Segin family eclipsed the $115,000 mark in funds raised. To date, the family has raised $122,000 for the Heart & Stroke foundation for the Southwest Ontario Region serving Halton, Hamilton, Niagara, Brantford regions. It is the single biggest independant fundraiser for this chapter. </p>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-6">
                <h2 class="aboutPageContentHeader">Dan D. Segin </h2>
                <hr>
                <p class="aboutPageContentText">  We celebrate this event in honour of our Father, Brother, Grandfather and Great Grandfather who passed in 2013 from a Heart attack due to complications from hip surgey. Dan D. Segin was a career millitary man who served in Korea at the age of 16, and later joined the P.P.C.L.I and served with the United Nations Peace Keeping Core in Cypress in 1974-1974 and finally the Canadian Airborne regiment up until his retirement in 1984 . His 35 years of service to our country is what we are so proud of. And we wish to thank all supporters of our annual event in celebrating his memory.</p>   

            </div>
            <div class="col-6">
                <img 
                src="images/milli.png"      
                width="100%"/>
            </div>
        </div>

        

    <!-- FOOTER -->
    <footer class="customFooter">
      <div class="row justify-content-md-center">
        <div class="col-md-auto">
          <div class="d-flex flex-column align-items-center">
          <br/>
          <h2 class="mb-4">Follow us</h2>
              <figure>
                    <a href="mailto:danasegin@ddsmemorial.ca"><img src="images/icons/gmail.png" alt="Emai" width="60" height="60"/></a>
                    <a href="https://www.facebook.com/danseginmemorialgolf"><img src="images/icons/facebook.png" alt="Facebook" width="60" height="60"/></a>
                    <a href="https://www.instagram.com/dandseginmemorialgolf/?fbclid=IwAR18jpY5QWajdv2qD22snOqdFg9yY8u1v3NKgMBsPdCKKcG0i_VwxMs1JhA"><img src="images/icons/instagram.png" alt="Instagram" width="60" height="60"/></a>
                    <a href="https://twitter.com/ddseginmemorial"><img src="images/icons/twitter.png" alt="Twitter" width="60" height="60"/></a>
                    <br/>
                                        
                </figure>
            </div>
        </div>
      </div>  
      <div class="row justify-content-md-center">
    </footer>
       
</div>

 
    </body>
</html>
