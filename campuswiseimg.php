<?php
require('./includes/function.php');
require('./includes/database.php');
$campus=$_GET['campus'];
$getYear=$_GET['year'];
$eventid=$_GET['eventid'];
$getEventData=getEventdataforImage($db,$eventid);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CUTM | CSaR | Gallery </title>
    <link rel="icon" href="assets/img/logo/cutm.png" type="image/icon type">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css?h=b7275171fee7833b33216c067c3940d2">
    <link rel="stylesheet" href="assets/css/contact-form-info.css?h=342c2ce30314aa52534c97edc5e26da5">
    <link rel="stylesheet" href="assets/css/filter-portfolio.css?h=6448068ee026269d44d82d2fd3647b5b">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css?h=cabc25193678a4e8700df5b6f6e02b7c">
    <link rel="stylesheet" href="assets/css/Highlight-Blue.css?h=91a04f2b18410bc09760f3473788176a">
    <link rel="stylesheet" href="assets/css/hover.css?h=d020500b6227369b22f252a195de70cd">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css">
    <link rel="stylesheet" href="assets/css/styles.css?h=dd8d698acf5504a6249ee2f03b989434">
</head>

<body style="height: auto;">
    <header>
        <nav class="navbar navbar-dark navbar-expand-md fixed-top mobi">
            <div class="container"><a class="navbar-brand" href="#"><img src="assets/img/logo/cutm_logo.png" alt="Logo" width="74" height="100"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse"
                    id="navcol-1" style="font-size: 14px;">
                    <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger scrollto" href="index.php">HOME</a></li>
                    <li class="nav-item dropdown">
                                <a
                                    class="dropdown-toggle nav-link"
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                                    href="#">DETAILS</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="aboutus.php">About</a>
                                    <a class="dropdown-item" href="instruction.php">Instructions</a>
                                </div>
                            </li>
                        <li class="nav-item"><a class="nav-link active js-scroll-trigger scrollto" href="imagegallery.php">GALLERY</a></li>
                        <li class="nav-item"><a class="nav-link scrollto" href="announcements.php">ANNOUNCEMENTS</a></li>
                        <li class="nav-item"><a class="nav-link scrollto" href="campus_activities.php">ACTIVITIES</a></li>
                        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">TEAM CSaR</a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="coordinators.php?campus=Balasore">Balasore</a>
                                    <a class="dropdown-item" href="coordinators.php?campus=Bhubaneswar">Bhubaneswar</a>
                                    <a class="dropdown-item" href="coordinators.php?campus=Balangir">Balangir</a>
                                    <a class="dropdown-item" href="coordinators.php?campus=Paralakhemundi">Paralakhemundi</a>
                                    <a class="dropdown-item" href="coordinators.php?campus=Rayagada">Rayagada</a>
                                    <a class="dropdown-item" href="coordinators.php?campus=Chhatrapur">Chatrapur</a>
                                    <a class="dropdown-item" href="coordinators.php?campus=Vizianagaram">Vizianagaram</a></div>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link js-scroll-trigger scrollto" href="./annualreport_campus.php">ANNUAL REPORT</a>
                            </li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger scrollto" href="campusachievements.php">ACHIEVEMENTS</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
      
   
    <!-- Start: year wise Image gallery -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="text-center section-title" style="padding-bottom: 0px;">
                <h3 class="text-uppercase" data-aos="fade-up" style="padding-top: 150px;">Events in&nbsp;<span style="color: #f96302;"><strong><?=$campus=$_GET['campus']?></strong></span></h3>
            </div>
            <hr data-aos="fade-up" style="width: 120px;border-bottom-style: none;padding-bottom: 30px;">
            <div class="row">
                <div class="col col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li class="filter-active" data-filter="*"><?=$getYear=$_GET['year']?>&nbsp;</li>
                        </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row portfolio-container">

<?php
$getImage=getgalleryimage($db,$eventid);
foreach($getImage as $getImages){
?>



                <div class="col-12 col-lg-4 col-md-6 portfolio-item filter-app" data-aos="fade-up" data-aos-delay="100">
                    <img class="img-fluid" src="assets/img/event_images/<?=$getImages['images']?>">
                    <div class="portfolio-info">
                            <h4><?=$getEventData['name']?></h4>
                            <p><?=$getEventData['years']?></p>
                            <a class="venobox preview-link" href="assets/img/event_images/<?=$getImages['images']?>" data-gall="portfolioGallery" data-title="App 1" data-lightbox="App">
                                <i class="fas fa-plus" style="font-size: 20px;"></i>
                            </a>
                               
                    </div>
                </div>
                <?php
}
?>
                




            </div>
        </div>
    </section>
    <!-- year wise Image gallery -->
    
    
    <!-- Start: Footer Dark -->
    <div class="footer-dark" style="background: url(&quot;assets/img/17-aoua1-night1.png?h=4b69291c09f7598206c94cbd642abc27&quot;) center / cover no-repeat, #03142c;">
        <footer>
            <div class="container">
                <div class="row">
                    <!-- Start: Services -->
                    <div class="col-sm-6 col-md-3 item" data-aos="fade-up">
                        <h3>About</h3>
                        <ul>
                            <li>
                                <a href="aboutus.php">CSaR</a>
                            </li>
                            <li>
                                    <a href="annualreport_campus.php">Annual Report</a>
                                </li>
                            <li>
                                <a href="instruction.php">Instructions</a>
                            </li>
                            <li>
                                <a href="campusachievements.php">Previous Achievements</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End: Services -->
                    <!-- Start: About -->
                    <div class="col-sm-6 col-md-3 item" data-aos="fade-up">
                        <h3>Clubs</h3>
                        <ul>
                            <li>
                                <a href="imagegallery.php">Image gallery</a>
                            </li>
                            <li>
                                <a href="announcements.php">Announcements</a>
                            </li>
                            <li>
                                <a href="events.php">Events</a>
                            </li>
                            <li>
                                <a href="assets/img/designer/index.html">Web Designer</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End: About -->
                    <!-- Start: Footer Text -->
                    <div class="col-md-6 item text" data-aos="fade-up">
                        <h4>Centurion University of Technology and Management</h4>
                        <h3><i class="fa fa-map-marker fa-1x" style="color:white"></i> Corporate Office</h3>
                        <p> HIG-4, Floor 1&2, Jaydev Vihar,Opp Pal Heights, Bhubaneswar, Dist: Khurda, Odisha, India.</p>
                        <h3 style="color:white"><i class="fa fa-globe fa-1x" style="color:white"></i> <a href="https://cutm.ac.in/">www.cutm.ac.in</h3></a>
                    </div>
                    <!-- End: Footer Text -->
                    <!-- Start: Social Icons -->
                    <div class="col text-center" data-aos="fade-up">
                        <a data-aos="fade-up" href="https://www.facebook.com/centurionuniversity/"><img src="assets/img/logo/facebook.png"></a><a data-aos="fade-up" href="https://www.instagram.com/cutmodisha/"><img src="assets/img/logo/instagram.png"></a><a data-aos="fade-up"
                            href="https://twitter.com/CUTMIndia"><img src="assets/img/logo/twitter.png"></a><a data-aos="fade-up" href="https://api.whatsapp.com/send/?phone=919692435036&text&app_absent=Hi"><img src="assets/img/logo/whatsapp.png"></a><a data-aos="fade-up" href="https://www.youtube.com/channel/UCy2a2NdleGSGlEd5FxyOcOA"><img src="assets/img/logo/youtube.png"></a></div>
                    <!-- End: Social Icons -->
                </div>
                <!-- Start: Copyright -->
                <p class="copyright" style="color: #ffffff;">© Copyright&nbsp;<script>document.write(new Date().getFullYear())</script>. All Rights
                        Reserved.Designed and Devloped by <a href="./assets/img/designer/index.html" style="color: #ffffff;" >Centurion University of Technology and Management </a></p>
                    <!-- End: Copyright -->
            </div>
        </footer>
    </div>
    <!-- End: Footer Dark -->
    <div><a class="text-center back-to-top" href="#"><i class="fa fa-angle-up"></i></a></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/smart-forms.min.js?h=b7275171fee7833b33216c067c3940d2"></script>
    <script src="assets/js/bs-init.js?h=009e1093d04bef4d964ccf07197400d3"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="assets/js/filter-portfolio-1.js?h=5e05f97835419d77ee3d48880a1e0e1f"></script>
    <script src="assets/js/filter-portfolio.js?h=8896e082b3fa1738e2e2f558a7fc1fa4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.js"></script>
</body>

</html>