<?php
require('../includes/function.php');
require('../includes/database.php');
$uemail=$_SESSION['email'];
$utype=$_SESSION['usertype'];
if($_SESSION['email'] and $utype=="teacher")
{
  $teacherData=getTeacherDetails($db,$uemail);
  ?>
    <!-- <script>
      alert("welcome ");
    </script> -->
  <?php
}
else
{
  header('location:../includes/logout.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <link rel="icon" href="image/cutm.png" type="image/icon type">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="teacher.php" class="logo d-flex align-items-center">
      <img src="../images/cutm.png" alt="">
      <span class="d-none d-lg-block"> | CSaR CUTM</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">




        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            

            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$uemail?></suserNamepan>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
            <a href="facultyprof.php"><img src="../images/profileimg/<?=$teacherData['profileimage']?>" height="70px" style=border-radius:50%;></a>
              <h6><?=$uemail?></h6>
              <span>Teacher</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../includes/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
      <a class="nav-link collapsed" href="teacherdashboard.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="teacher.php">
        <i class="bi bi-calendar3"></i>
        <span>Event timesheet approval</span>
      </a>
    </li>
        <li class="nav-item">
              <a class="nav-link collapsed" href="facultyprof.php">
                  <i class="bi bi-person-fill"></i>
                  <span>Profile</span>
              </a>
          </li>
         <li class="nav-item">
              <a class="nav-link collapsed" href="../includes/logout.php">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Log out</span>
              </a>
          </li>



  </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="teacher.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Post</h5>
              <form action="../includes/multipleselect.php" method="POST">
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Select</th>
                    <th>Sl</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col-8">Year of Program</th>
                    <th scope="col">CSaR program</th>
                    <th scope="col">Club</th>
                    <th scope="col">Date</th>
                    <th scope="col">From Time</th>
                    <th scope="col">End Time</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <th scope="col">Reject</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // echo $teacherData['campus'];
                  // echo $teacherData['Clubget'];
                    $posts=getAllPostTeacher($db,$teacherData['campus'],$teacherData['Clubget']);
                    $count=1;
                    date_default_timezone_set('Asia/Kolkata');
                    $today=date("Y-m-d");
                    // $today=date("2022-11-09");
                    echo $today;
                    foreach($posts as $post){
                      $posttime=date('Y-m-d',strtotime($post['postTime']));
                      $posttimeNextDay=date('Y-m-d',strtotime('+1 day', strtotime($post['postTime'])));
                      
                      // $posttime="2022-11-08";
                      // $posttimeNextDay="2022-11-09";
                      
                      // echo $posttime;
                      // echo $posttimeNextDay;

                      $postReject='<a href="../includes/reject.php?id='.$post['id'].'" class="btn btn-danger">
                                    Reject
                                  </a>';
                      $postAccept='<a href="../includes/status.php?id='.$post['id'].'" class="btn btn-success">
                                    Approve
                                  </a>';

                      if($today>=$posttime && $today<=$posttimeNextDay){
                        $checkBtn='<input type="checkbox" name="allId[]" value="'.$post['id'].'">';
                        if($post['status']=="Rejected"){
                          $postAccept='<a href="../includes/status.php?id='.$post['id'].'" class="btn btn-success">
                                    Approve
                                  </a>';
                          $postReject='<a class="btn btn-secondary">Reject</a>';

                        }elseif($post['status']=="Approved"){
                          $postReject='<a href="../includes/reject.php?id='.$post['id'].'" class="btn btn-danger">
                                    Reject
                                  </a>';
                          $postAccept='<a class="btn btn-secondary">Approve</a>';
                        }
                      }else{
                        $postReject='<a class="btn btn-secondary">Reject</a>';
                        $postAccept='<a class="btn btn-secondary">Approve</a>';
                        $checkBtn="";
                      }
                    ?>
                      <tr>
                      <th scope="row"><?=$checkBtn?></th>
                        <th scope="row"><?=$count?></th>
                        <td><?=$post['NameOfStd']?></td>
                        <td><?=$post['emailOfStd']?></td>
                        <td><?=$post['yearOfPr']?></td>
                        <td><?=$post['csrPr']?></td>
                        <td><?=$post['club']?></td>
                        <td><?=$post['date']?></td>
                        <td><?=$post['fromTime']?></td>
                        <td><?=$post['endTime']?></td>
                        <td><?=(int)$post['totalTime']?></td>
                        <td><?=$post['status']?></td>
                        <td><?=$postAccept?></td>
                        <td><?=$postReject?></td>
                      </tr>
                    <?php
                    $count++;
                  }
                  ?>
                  
                  
                  
                </tbody>
              </table>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#openForAdd">Approve All</button>

              <!-- Modal -->
              <div class="modal fade" id="openForAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Do You Want to Approve</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success" name="submitall">Yes</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        </div>
                        </div>
                    </div>
                </div>


              </form>
              <!-- End Table with stripped rows -->

            </div>
          </div>
                

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>CSaR | CUTM</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://cutm.ac.in/">Centurion University of Technology and Management</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>