<?php
    function getAllYear($db){
        $query="SELECT * FROM year";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllCampus($db){
        $query="SELECT * FROM campus";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getSessionByYear($db,$year){
        $query="SELECT * FROM year WHERE admissionyear='$year'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data['Year'];
    }

    function getYearBySession($db,$AddmissionYear){
        $query="SELECT * FROM year WHERE Year='$AddmissionYear'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data['admissionyear'];
    }

    function getAllPost($db,$uemail){
        $query="SELECT * FROM csrtimesheet WHERE emailOfStd='$uemail' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }



    function getAllPostTeacher($db,$campus,$Clubget){
        $query="SELECT * FROM csrtimesheet WHERE campus='$campus' AND club='$Clubget' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllPostTeacherSession($db,$campus,$Clubget,$sessionSelect){
        $query="SELECT * FROM csrtimesheet WHERE club='$Clubget' AND campus='$campus' AND yearOfPr='$sessionSelect' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllPostAdmin($db){
        $query="SELECT NameOfStd,emailOfStd,totalTime,id,SUM(totalTime) as totalTime FROM csrtimesheet GROUP BY emailOfStd ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllProgramAdmin($db){
        $query="SELECT * FROM csrpr  ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllPostAdminByClub($db,$school,$campus){
        $query="SELECT NameOfStd,emailOfStd,totalTime,id,SUM(totalTime) as totalTime FROM csrtimesheet WHERE schoolname='$school' AND campus='$campus' GROUP BY emailOfStd ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllPostAdminBySchoolClub($db,$school,$campus,$program,$clubname){
        $query="SELECT NameOfStd,emailOfStd,totalTime,id,SUM(totalTime) as totalTime FROM csrtimesheet WHERE schoolname='$school' AND campus='$campus' AND csrPr='$program' AND club='$clubname' GROUP BY emailOfStd ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }
    
    function getAllPostAdminByCampus($db,$campus){
        $query="SELECT NameOfStd,emailOfStd,totalTime,id,SUM(totalTime) as totalTime FROM csrtimesheet WHERE campus='$campus' GROUP BY emailOfStd ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getUserNmae($db,$uemail){
        $query="SELECT * FROM student WHERE email='$uemail'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getStudentSports($db,$uemail){
        $query="SELECT SUM(totalTime) as totalTime FROM csrtimesheet WHERE emailOfStd='$uemail' AND csrPr='Sports'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data['totalTime'];
    }

    function getStudentResponsibility($db,$uemail){
        $query="SELECT SUM(totalTime) as totalTime FROM csrtimesheet WHERE emailOfStd='$uemail' AND csrPr='Responsibility'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data['totalTime'];
    }

    function getStudentCulture($db,$uemail){
        $query="SELECT SUM(totalTime) as totalTime FROM csrtimesheet WHERE emailOfStd='$uemail' AND csrPr='Culture'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data['totalTime'];
    }

    function getAllStudentDetailsByAdmin($db,$campus){
        $query="SELECT * FROM student WHERE campus='$campus' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }


    function getAllStudentDetails($db,$uemail){
        $query="SELECT * FROM student WHERE email='$uemail' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getAllAdminDetails($db,$uemail){
        $query="SELECT * FROM admin WHERE email='$uemail' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getTeacherDetails($db,$uemail){
        $query="SELECT * FROM teacher WHERE email='$uemail' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getAllPostByAdmin($db,$uemail,$year){
        $query="SELECT * FROM csrtimesheet WHERE emailOfStd='$uemail' AND yearOfPr='$year' AND status='Approved' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getStudentCultureByAdmin($db,$uemail){
        $query="SELECT SUM(totalTime) as totalTime FROM csrtimesheet WHERE emailOfStd='$uemail' AND csrPr='Culture'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data['totalTime'];
    }
    
    function getStudentResponsibilityByAdmin($db,$uemail){
        $query="SELECT SUM(totalTime) as totalTime FROM csrtimesheet WHERE emailOfStd='$uemail' AND csrPr='Responsibility'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data['totalTime'];
    }

    function getStudentSportsByAdmin($db,$uemail){
        $query="SELECT SUM(totalTime) as totalTime FROM csrtimesheet WHERE emailOfStd='$uemail' AND csrPr='Sports'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data['totalTime'];
    }

    function getStudentResultyr1($db,$uemail,$year){
        $query="SELECT * FROM certificatelog WHERE email='$uemail' AND Year='$year'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getStudentResultyr2($db,$uemail,$year){
        $query="SELECT * FROM certificatelog WHERE email='$uemail' AND Year='$year'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getStudentResultyr3($db,$uemail,$year){
        $query="SELECT * FROM certificatelog WHERE email='$uemail' AND Year='$year'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getStudentResultyr4($db,$uemail,$year){
        $query="SELECT * FROM certificatelog WHERE email='$uemail' AND Year='$year'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getImagesByPost($db,$email){
        $query="SELECT * FROM student WHERE email='$email'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getStudentDataByRegd($db,$regd){
        $query="SELECT * FROM studregd WHERE regd='$regd'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function randPass() {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,8);
    }

    // function getannouncement($db){
    //     $today=date("Y-m-d");
    //     $query="SELECT * FROM announcement WHERE date_time='$today'";
    //     $run=mysqli_query($db,$query);
    //     $data=array();
    //     while($d=mysqli_fetch_assoc($run)){
    //         $data[]=$d;
    //     }
    //     return $data;
    // }
    function getgallery1($db,$campus){
        $query="SELECT * FROM gallery1 WHERE campus='$campus' GROUP BY years";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getgalleryyear($db,$campus,$getYear){
        $query="SELECT * FROM gallery1 WHERE campus='$campus' AND years='$getYear'";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }
    function getEventdataforImage($db,$eventid){
        $query="SELECT * FROM gallery1 WHERE id='$eventid'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getgalleryimage($db,$eventid){
        $query="SELECT * FROM gallery2 WHERE connect_id	='$eventid'";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getcoordinators($db,$Coordinators,$campus){
        $query="SELECT * FROM coordinators WHERE campus='$campus' AND type='$Coordinators'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getpreachievements($db,$campus,$years){
        $query="SELECT * FROM preachievements WHERE campus='$campus' AND years='$year'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    

    function getAllArchivementPdf($db,$campus,$year){

        $query="SELECT * FROM preachievements WHERE campus='$campus' AND year='$year'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getinsertannouncements($db){
        $todayis=date("Y-m-d");

        $query="SELECT * FROM announcement WHERE '$todayis' between date_time and end_date ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getinsertannouncementsforBBSR($db){
        $todayis=date("Y-m-d");

        $query="SELECT * FROM announcement WHERE campus='Bhubaneswar' AND '$todayis' between date_time and end_date ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getinsertannouncementsforBLS($db){
        $todayis=date("Y-m-d");

        $query="SELECT * FROM announcement WHERE campus='Balasore' AND '$todayis'  between date_time and end_date ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getinsertannouncementsforBLR($db){
        $todayis=date("Y-m-d");

        $query="SELECT * FROM announcement WHERE campus='Balangir' AND '$todayis' between date_time and end_date ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }
    
    function getinsertannouncementsforPKD($db){
        $todayis=date("Y-m-d");

        $query="SELECT * FROM announcement WHERE campus='Paralakhemundi' AND '$todayis' between date_time and end_date ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getinsertannouncementsforRYD($db){
        $todayis=date("Y-m-d");

        $query="SELECT * FROM announcement WHERE campus='Rayagada' AND '$todayis' between date_time and end_date ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getinsertannouncementsforCTR($db){
        $todayis=date("Y-m-d");

        $query="SELECT * FROM announcement WHERE campus='Chatrapur' AND '$todayis' between date_time and end_date ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getinsertannouncementsforVGM($db){
        $todayis=date("Y-m-d");

        $query="SELECT * FROM announcement WHERE campus='Vizianagaram' AND '$todayis' between date_time and end_date ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }
    

    function getAllCodrinator($db,$campus,$cordinatorType){

        $query="SELECT * FROM coordinators WHERE campus='$campus' AND type='$cordinatorType'";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }


    function getAllArchivement($db,$campus){

        $query="SELECT * FROM preachievements WHERE campus='$campus'";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllPostbyId($db,$id){
        $query="SELECT * FROM csrtimesheet WHERE id='$id'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    function getAllRegisterStudent($db,$campus){
        $query="SELECT * FROM student WHERE campus='$campus'";
        $data=mysqli_query($db, $query);
        $total=mysqli_num_rows($data);
        return $total;
    }

    function getAllAcadamicYearStatus($db,$campus,$program,$month){
        
        $query="SELECT SUM(totalTime) as totalTime FROM csrtimesheet WHERE MONTH(date)=$month AND campus='$campus' AND csrPr='$program'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data['totalTime'];
    }

    function getAllRegisterStudentProgramwise($db,$campus,$program){
        $query="SELECT * FROM csrtimesheet WHERE campus='$campus' AND csrPr='$program' GROUP BY emailOfStd;";
        $data=mysqli_query($db, $query);
        $total=mysqli_num_rows($data);
        return $total;
    }
    function getAllRegisterStudentSchoolAndclubwiseByTeacher($db,$campus,$club,$school){
        $query="SELECT * FROM csrtimesheet WHERE campus='$campus' AND club='$club' AND schoolname='$school' GROUP BY emailOfStd;";
        $data=mysqli_query($db, $query);
        $total=mysqli_num_rows($data);
        return $total;
    }

    function getAllStudentdataprogramwiseGrappg($db,$stdEmail,$program){
        $query="SELECT SUM(totalTime) as totalTime, club FROM csrtimesheet WHERE emailOfStd='$stdEmail' AND csrPr='$program' GROUP BY club;";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllStudentdaywisegraph($db,$stdEmail){
        $today=date("Y-m-d");
        $query="SELECT SUM(totalTime) as totalTime, date FROM csrtimesheet WHERE emailOfStd='$stdEmail' GROUP BY date ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllTeacherdaywisegraph($db,$club){
        $today=date("Y-m-d");
        $query="SELECT SUM(totalTime) as totalTime, date FROM csrtimesheet WHERE club='$club' GROUP BY date ORDER BY id DESC;";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllStudentdataprogramwiseByAdmin($db,$campus,$program){
        $query="SELECT SUM(totalTime) as totalTime, club FROM csrtimesheet WHERE campus='$campus' AND csrPr='$program' GROUP BY club;";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }


    function getTotalTime($db,$csrPr){
        $query="SELECT SUM(totalTime) as totalTime FROM csrtimesheet WHERE csrPr='$csrPr'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data['totalTime'];
    }

    function getAnnouncements($db){
        $todayis=date("Y-m-d");

        $query="SELECT * FROM announcement WHERE '$todayis' between date_time and end_date ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;    
    }


    function homeAnnouncement($db,$id){
        $query="SELECT * FROM announcement WHERE id='$id'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }

    // for super admin 
    function getAllAcadamicYearStatusBySuperAdmin($db,$program,$month){
        
        $query="SELECT SUM(totalTime) as totalTime FROM csrtimesheet WHERE MONTH(date)=$month AND csrPr='$program'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data['totalTime'];
    }

    function getAllRegisterStudentProgramwiseBySuperAdmin($db,$program){
        $query="SELECT * FROM csrtimesheet WHERE csrPr='$program' GROUP BY emailOfStd;";
        $data=mysqli_query($db, $query);
        $total=mysqli_num_rows($data);
        return $total;
    }

    function getAllStudentdataprogramwiseBySuperAdmin($db,$program){
        $query="SELECT SUM(totalTime) as totalTime, club FROM csrtimesheet WHERE csrPr='$program' GROUP BY club;";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllRegisterStudentBySuperadmin($db){
        $query="SELECT * FROM csrtimesheet ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllPostBySuperadmin($db,$campus,$sessionSelect){
        $query="SELECT * FROM csrtimesheet WHERE campus='$campus' AND yearOfPr='$sessionSelect' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllPostCampusBySuperadmin($db,$campus){
        $query="SELECT * FROM csrtimesheet WHERE campus='$campus' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getTeacherDetailsBySuperAdmin($db){
        $query="SELECT * FROM teacher ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getTeacherDetailsBySuperAdminCampusandClug($db,$campus,$club){
        $query="SELECT * FROM teacher WHERE campus='$campus' && Clubget='$club' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getTeacherDetailsBySuperAdminCampus($db,$campus){
        $query="SELECT * FROM teacher WHERE campus='$campus' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getStudentREGDDetailsBySuperAdmin($db){
        $query="SELECT * FROM studregd ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllStudentDetailsBySuperAdminYearWise($db,$campus,$year){
        $query="SELECT * FROM student WHERE campus='$campus' && admissionyear='$year' ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAllStudentDetailsBySuperAdmin($db){
        $query="SELECT * FROM student ORDER BY id DESC";
        $run=mysqli_query($db,$query);
        $data=array();
        while($d=mysqli_fetch_assoc($run)){
            $data[]=$d;
        }
        return $data;
    }

    function getAcademicyr($db,$academicyr,$campus){
        $query="SELECT * FROM annualreport WHERE campus='$campus' AND academicyr='$academicyr'";
        $run=mysqli_query($db,$query);
        $data=mysqli_fetch_assoc($run);
        return $data;
    }
?>