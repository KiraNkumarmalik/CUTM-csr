<?php
require('../includes/function.php');
require('../includes/database.php');
$uemail=$_SESSION['email'];
$utype=$_SESSION['usertype'];



if($_SESSION['email'] and $utype=="admin")
{
  $adminData=getAllAdminDetails($db,$uemail);
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

if(isset($_POST['passwordbtn'])){
  $oldpassword=mysqli_real_escape_string($db,$_POST['oldpassword']);
  $newpassword=mysqli_real_escape_string($db,$_POST['newpassword']);
  $renewpassword=mysqli_real_escape_string($db,$_POST['renewpassword']);
  $oldpassword=md5($oldpassword);



  if($adminData['password'] == $oldpassword){
    if($newpassword == $renewpassword){
      $newpassword=md5($newpassword);
      $adminemail=$adminData['email'];
      $query="UPDATE admin SET password='$newpassword' WHERE email='$adminemail'";
      $run=mysqli_query($db,$query) or die(mysqli_error($db));
      if ($run) {
        ?>
        <script>
          alert("password Changed ");
        </script>
      <?php
      }
      else {
        ?>
        <script>
          alert("Password Update error ");
        </script>
      <?php
       }

    }
    else{
      ?>
        <script>
          alert("password and confirm password not match ");
        </script>
      <?php
    }

  }
  else{
    ?>
    <script>
      alert("Old password not match ");
    </script>
  <?php
  }

 
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile</title>
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
      <a href="student.php" class="logo d-flex align-items-center">
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
            <a href="adminprof.php"><img src="../images/profileimg/<?=$adminData['profileimg']?>" height="70px" style=border-radius:50%;></a>
              <h6><?=$uemail?></h6>
              <span>Admin</span>
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
            <a class="nav-link collapsed" href="./admin.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="./certificateapprove.php">
              <i class="bi bi-file-check-fill"></i>
              <span>Certificate approval</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link collapsed" href="./studentapproval.php">
              <i class="bi bi-person-badge-fill"></i>
              <span>Participants ID Approval</span>
          </a>
      </li> 

    <li class="nav-item">
          <a class="nav-link collapsed" href="./addfaculty.php">
              <i class="bi bi-journal-text"></i>
              <span>Add Faculty In-charge</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link collapsed" href="./addClub.php">
              <i class="bi bi-file-earmark-plus"></i>
              <span>Add New Club</span>
          </a>
      </li>

      <li class="nav-item">
              <a class="nav-link collapsed" href="./addannouncement.php">
                  <i class="bi bi-megaphone-fill"></i>
                  <span>Announcements</span>
              </a>
          </li>

      <li class="nav-item">
              <a class="nav-link collapsed" href="./gallery_uploads.php">
                  <i class="bi bi-images"></i>
                  <span>Gallery</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link collapsed" href="./coordinator_uploads.php">
                  <i class="bi bi-people-fill"></i>
                  <span>Co-ordinators</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link collapsed" href="./achievement_uploads.php">
                  <i class="bi bi-trophy-fill"></i>
                  <span>Achievements</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link collapsed" href="./activities_upload.php">
                  <i class="bi bi-activity"></i>
                  <span>Activities</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link collapsed" href="./annual_reports.php">
                  <i class="bi bi-journals"></i>
                  <span>Annual Reports</span>
              </a>
          </li>

         <li class="nav-item">
              <a class="nav-link" href="./adminprof.php">
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
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="../images/profileimg/<?=$adminData['profileimg']?>" alt="<?=$adminData ?>" width="170" height="130"ALIGN="right"HSPACE="30"VSPACE="30"style=border-radius:50%;/>
              <h2><?=$adminData['name']?></h2>
              <h3><?=$adminData['designation']?></h3>
              <h3>Admin</h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic"><?=$adminData['about']?></p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?=$adminData['name']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Designation</div>
                    <div class="col-lg-9 col-md-8"><?=$adminData['designation']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Campus</div>
                    <div class="col-lg-9 col-md-8"><?=$adminData['campus']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8"><?=$adminData['country']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?=$adminData['address']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Sex</div>
                    <div class="col-lg-9 col-md-8"><?=$adminData['sex']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?=$adminData['mobile']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?=$adminData['email']?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="../includes/createuser.php" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="../images/profileimg/<?=$adminData['profileimg']?>">
                        <div class="pt-2">
                          
                          <input class="form-control" type="file" id="formFile" name="imageupload" accept="image/*">
                          <p style="color:red;">*Upload Photo Max. Size upto 50Kb.*</p>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?=$adminData['name']?>" readonly>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px"><?=$adminData['about']?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Designation</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="desc" type="text" class="form-control" id="company" value="<?=$adminData['designation']?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Campus</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="Job" value="<?=$adminData['campus']?>" readonly>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="Country" value="<?=$adminData['country']?>" readonly>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="<?=$adminData['address']?>" readonly>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="<?=$adminData['mobile']?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?=$adminData['email']?>" readonly>
                      </div>
                    </div>

                    
                    <!-- Modal -->
              <div class="modal fade" id="updateadminProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Do You Sure to Update</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success" name="editadminprofile">Yes</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        </div>
                        </div>
                    </div>
                </div>
                  </form><!-- End Profile Edit Form -->
                  <div class="text-center">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateadminProfile">Save Changes</button>
                    </div>

                </div>


                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="" method="post">

                  <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Old Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="oldpassword" type="password" class="form-control" id="newPassword" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword" value="">
                      </div>
                    </div>

                    
                    <!-- Modal -->
              <div class="modal fade" id="changeadminPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Do You Sure to Update</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success" name="passwordbtn">Yes</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        </div>
                        </div>
                    </div>
                </div>
                  </form><!-- End Change Password Form -->
                  <div class="text-center">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changeadminPassword">Change Password</button>
                    </div>
                </div>

              </div><!-- End Bordered Tabs -->

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
