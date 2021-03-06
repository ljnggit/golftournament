<?php
  /**
   * sponsors.php is the sponsors gallery page
   * start the session so we can access our session variables that are active in the session
   */
  session_start();
  /**
   * If the session variable 'id' exists, check if it equals 1 (logged in as admin) to make sure the admin link on the navbar is visible
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
    <div>
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
        <div class="container">
            <div class="row d-flex flex-wrap align-items-center" id="displayImages" data-toggle="modal" data-target="#lightbox">
                <?php 
                    include_once 'server/connect.php'; 
                $path;
                $paths = [];
                $idArray = [];
                $counter = 0;
                $admin = true;
                
                if($admin) {
                    $hidden="";
                } else {
                    $hidden="hidden";
                }
                
                $stmt = $dbh->query("SELECT * FROM sponsor_logos");
                while($row = $stmt->fetch()) {//while there's still rows to fetch (images)
                        echo '<div class="col-12 col-md-6 col-lg-3">';
                        $path = $row['file_path'];
                        $paths[$counter] = trim($row['file_path'], '"');
                        $pathsDescription[$counter] = trim($row['sponsor_description'], '"');
                        $pathsName[$counter] = trim($row['sponsor_name'], '"');
                        $pathsLink[$counter] = trim($row['sponsor_link'], '"');
                        if(!$pathsLink) {
                            $hiddenLink = "hidden";
                        } else {
                            $hiddenLink = "";
                        }
                        if(!$pathsDescription) {
                            $hiddenDescription = "hidden";
                        } else {
                            $hiddenDescription = "";
                        }
                        $hiddenDescription = "hidden";
                        
                        
                        $id = $row['sponsor_id'];
                        $idArray[$counter] = $id;
                        echo '<img src="'.$path.'" data-target="#indicators" data-slide-to="'.$counter.'">';
                        echo '</div>';
                        $counter += 1;
                } 
                ?> 
            </div>


            <div class="modal fade" id="lightbox" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close text-right p-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                <div id="indicators" class="carousel slide" data-interval="false">
                <div class="carousel-inner">                
                
                    <?php
                    
                        //making modal - popup image
                        $i = 0;
                        while($i < count($paths)) {
                        if($i == 0){                           
                            echo '<h1></h1>';
                            echo '<div class="carousel-item active">';
                            echo '<div class="col align-self-center" style="border-bottom: 2.5px solid black; border-top: 2.5px solid black;">';
                            echo '<h3 style="text-align:center">'.$pathsName[$i].'</h3>';                    
                            echo '<h5 class="sponsorDescription" "'.$hiddenDescription.'">'.trim($pathsDescription[$i], '"').'</h5>';
                            echo '<a  "'.$hiddenLink.'" href="'.$pathsLink[$i].'"><h5 style="text-align:center" class="mt-5">Visit '.$pathsName[$i].'</h5> </a>';
                            echo '</div>';
                            echo '<div class="form-group mt-5">';
                            echo '</div>';
                            echo '<img class="d-block w-100 h-auto mb-5" src="'.$paths[$i].'"/>';
                            echo '<form method="POST" action="server/deleteSponsorPicture.php" style="text-align:center" '.$_SESSION['adminHide'].'>';
                            echo '<button class="btn btn-danger mt-5 mb-5" name="delete" value="'.$idArray[$i].'"> Delete Sponsor</button>';
                            echo '</form>';
                            echo '</div>';
                            
                        }else{
                            
                            echo '<div class="carousel-item ">';
                            echo '<div class="col align-self-center" style="border-bottom: 2.5px solid black; border-top: 2.5px solid black;">';
                            echo '<h3 style="text-align:center">'.$pathsName[$i].'</h3>';                    
                            echo '<h5 class="sponsorDescription" "'.$hiddenDescription.'">'.trim($pathsDescription[$i], '"').'</h5>';
                            echo '<a  "'.$hiddenLink.'" href="'.$pathsLink[$i].'"><h5 style="text-align:center" class="mt-5">Visit '.$pathsName[$i].'</h5> </a>';
                            echo '</div>';
                            echo '<div class="form-group mt-5">';
                            echo '</div>';
                            echo '<img class="d-block w-100  h-auto mb-5" src="'.$paths[$i].'"/>';
                            echo '<form method="POST" action="server/deleteSponsorPicture.php" style="text-align:center" '.$_SESSION['adminHide'].'>';
                            echo '<button class="btn btn-danger mt-5 mb-5" name="delete" value="'.$idArray[$i].'"> Delete Sponsor</button>';
                            echo '</form>';
                            echo '</div>';
                        }                 
                        $i +=1;
                    } 
                    ?>
                    </div>  
                    <a class="carousel-control-prev" href="#indicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#indicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            </div>
        </div>
        </div>
            
    </div>
    
    <!-- FOOTER -->
    <footer class="customFooter" style="margin-top: 55em;">
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
       
        

 
    </body>
</html>
