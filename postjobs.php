<?php
include './header.php';
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
include './DbConnection.php';
$db = new Db();
$retres = array();

$department = "";
$openingdate = "";
$closingdate = "";
$jobtitle = "";
$vacancies = "";
$agegeneral = "";
$agebcobc = "";
$agesc = "";
$qualificationfirst = "";
$qualificationsecond = "";
$qualificationthired = "";
//$howtoapply = "";
$declaration = "";
$eligibility = "";
$qualification = "";
$reservations = "";
$restolocal = "";
$defoflocal = "";
$age = "";
$dhowtoapply = "";
$fee = "";
$modeofpayment = "";
$schemeofexam = "";
$centers = "";
$jobid = "";

function allvariables() {
    unset($department);
    unset($openingdate);
    unset($closingdate);
    unset($jobtitle);
    unset($vacancies);
    unset($agegeneral);
    unset($agebcobc);
    unset($agesc);
    unset($qualificationfirst);
    unset($qualificationsecond);
    unset($qualificationthired);
//$howtoapply = "";
    unset($declaration);
    unset($eligibility);
    unset($qualification);
    unset($reservations);
    unset($restolocal);
    unset($defoflocal);
    unset($age);
    unset($dhowtoapply);
    unset($fee);
    unset($modeofpayment);
    unset($schemeofexam);
    unset($centers);
    unset($jobid);
    $department = "";
    $openingdate = "";
    $closingdate = "";
    $jobtitle = "";
    $vacancies = "";
    $agegeneral = "";
    $agebcobc = "";
    $agesc = "";
    $qualificationfirst = "";
    $qualificationsecond = "";
    $qualificationthired = "";
//$howtoapply = "";
    $declaration = "";
    $eligibility = "";
    $qualification = "";
    $reservations = "";
    $restolocal = "";
    $defoflocal = "";
    $age = "";
    $dhowtoapply = "";
    $fee = "";
    $modeofpayment = "";
    $schemeofexam = "";
    $centers = "";
    $jobid = "";
}

if (isset($_GET) && isset($_GET['jobid'])) {
    $jobid = $_GET['jobid'];
    $resget = $db->query("select * from notifications where jobid = :jobid", [":jobid" => $jobid]);
    if ($resget->result->rowCount() > 0) {
        $getresults = $resget->get('assoc')[0];
        extract($getresults);
//        echo $centers;
//        echo $department;
//        echo $agegeneral;
    }
}

if (isset($_POST) && isset($_POST['submit'])) {
    extract($_POST);
    if ($db::$dbcon) {
        $dbrest = null;
        if (!isset($jobid) || empty($jobid)) {
            $dbrest = $db->query("insert into notifications(department,openingdate,closingdate,jobtitle,vacancies,agegeneral,agebcobc,agesc,qualificationfirst,qualificationsecond,qualificationthired,howtoapply,declaration,eligibility,qualification,reservations,restolocal,defoflocal,age,fee,modeofpayment,schemeofexam,centers)"
                    . " values(:department,:openingdate,:closingdate,:jobtitle,:vacancies,:agegeneral,:agebcobc,:agesc,:qualificationfirst,:qualificationsecond,:qualificationthired,:dhowtoapply,:declaration,:eligibility,:qualification,:reservations,:restolocal,:defoflocal,:age,:fee,:modeofpayment,:schemeofexam,:centers)", [":department" => $department, ":openingdate" => $openingdate, ":closingdate" => $closingdate, ":jobtitle" => $jobtitle, ":vacancies" => $vacancies, ":agegeneral" => $agegeneral, ":agebcobc" => $agebcobc, ":agesc" => $agesc, ":qualificationfirst" => $qualificationfirst, ":qualificationsecond" => $qualificationsecond, ":qualificationthired" => $qualificationthired, ":dhowtoapply" => $dhowtoapply, ":declaration" => $declaration, ":eligibility" => $eligibility, ":qualification" => $qualification, ":reservations" => $reservations, ":restolocal" => $restolocal, ":defoflocal" => $defoflocal, ":age" => $age, ":fee" => $fee, ":modeofpayment" => $modeofpayment, ":schemeofexam" => $schemeofexam, ":centers" => $centers]); //->get();
            allvariables();
        } else {
            $dbrest = $db->query("update notifications  set department = :department,openingdate =:openingdate,closingdate= :closingdate,jobtitle =:jobtitle,vacancies =:vacancies,agegeneral =:agegeneral,agebcobc =:agebcobc,agesc =:agesc,qualificationfirst =:qualificationfirst,qualificationsecond =:qualificationsecond,qualificationthired =:qualificationthired,howtoapply =:dhowtoapply,declaration =:declaration,eligibility =:eligibility,qualification =:qualification,reservations =:reservations,restolocal =:restolocal,defoflocal =:defoflocal,age =:age,fee =:fee,modeofpayment =:modeofpayment,schemeofexam =:schemeofexam,centers = :centers where jobid = :jobid", [":department" => $department, ":openingdate" => $openingdate, ":closingdate" => $closingdate, ":jobtitle" => $jobtitle, ":vacancies" => $vacancies, ":agegeneral" => $agegeneral, ":agebcobc" => $agebcobc, ":agesc" => $agesc, ":qualificationfirst" => $qualificationfirst, ":qualificationsecond" => $qualificationsecond, ":qualificationthired" => $qualificationthired, ":dhowtoapply" => $dhowtoapply, ":declaration" => $declaration, ":eligibility" => $eligibility, ":qualification" => $qualification, ":reservations" => $reservations, ":restolocal" => $restolocal, ":defoflocal" => $defoflocal, ":age" => $age, ":fee" => $fee, ":modeofpayment" => $modeofpayment, ":schemeofexam" => $schemeofexam, ":centers" => $centers, ":jobid" => $jobid]); //->get();
            allvariables();
        }
        if ($dbrest) {
            if ($dbrest->result->rowCount() > 0) {
                if (!isset($slno) and empty($slno)) {
                    array_push($retres, ["code" => 200, "mesg" => "Successfully Registered"]);
                } else {
                    array_push($retres, ["code" => 200, "mesg" => "Successfully Updated"]);
                }
            } else {
                array_push($retres, ["code" => 203, "mesg" => "Some Thing Went Wrong"]);
            }
        }
//        else {
//            array_push($retres, ["code" => 202, "mesg" => "Some Thing Went Wrong"]);
//        }
    } else {
        array_push($retres, ["code" => 204, "mesg" => "wrong db credentials"]);
    }
}

function clean($string) {
    $string = str_replace(" ", "-", $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
?>
<!--
<!Doctype html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html">
        <title>BharatNext</title>
        <meta name="author" content="Jake Rocheleau">
                <link rel="shortcut icon" href="http://static.tmimgcdn.com/img/favicon.ico">
                <link rel="icon" href="http://static.tmimgcdn.com/img/favicon.ico">
        <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
        <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
        <script type="text/javascript" src="js/switchery.min.js"></script>
        <script type="text/javascript" src="js/jquery.3.3.1.min.js"></script>
        <script type="text/javascript" src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    </head>

    <body>-->
        <div id="wrapper">

            <h1><?php echo empty($jobid) ? "Job Posting" : "Job Editing" ?></h1>

            <form  name="postjob" id="postjob" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <input type="hidden" name="jobid" value="<?php echo $jobid ?>" > 
                <div class="col-3">
                    <label>
                        Company Name
                        <input type="text" placeholder="What is departent name?" id="department" name="department" tabindex="1" value="<?php echo $department; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Opening Date
                        <input type="date" placeholder="Opening Date" id="openingdate" name="openingdate" tabindex="2" value="<?php echo $openingdate; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Closing Date
                        <input type="date" placeholder="Closing Date" id="closingdate" name="closingdate" tabindex="2" value="<?php echo $closingdate; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Job Title
                        <input type="text" placeholder="Job Title" id="jobtitle" name="jobtitle" tabindex="1" value="<?php echo $jobtitle; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        vacancies
                        <input type="text" placeholder="Number of vacancies" id="vacancies" name="vacancies" tabindex="1" value="<?php echo $vacancies; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Age for General
                        <input type="text" placeholder="Max Age for General" id="agegeneral" name="agegeneral" tabindex="1" value="<?php echo $agegeneral; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Age for BC/OBC
                        <input type="text" placeholder="Max Age for BC/OBC" id="agebcobc" name="agebcobc" tabindex="1" value="<?php echo $agebcobc; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Age for SC
                        <input type="text" placeholder="Max Age for SC" id="agesc" name="agesc" tabindex="1" value="<?php echo $agesc; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Qualification first
                        <input type="text" placeholder="Qualification for job" id="qualificationfirst" name="qualificationfirst" tabindex="1" value="<?php echo $qualificationfirst; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Qualification second
                        <input type="text" placeholder="Qualification for job" id="qualificationsecond" name="qualificationsecond" tabindex="1" value="<?php echo $qualificationsecond; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Qualification third
                        <input type="text" placeholder="Qualification for job" id="qualificationthired" name="qualificationthired" tabindex="1" value="<?php echo $qualificationthired; ?>">
                    </label>
                </div>

                <div class="col-md-12 m-3 bg-light p-1">
                    <label>
                        How to apply
                    </label>
                </div>
                <div class="col-3" id="gd" onclick="myFunction1();">
                    <label>
                        General Declaration
                    </label>                   
                </div>
                <div class="col-3" onclick="myFunction2();">                    
                    <label>
                        Eligibility
                    </label>
                </div>
                <div class="col-3"  onclick="myFunction3();">                   
                    <label>
                        Educational Qualification
                    </label>
                </div>
                <div class="col-3" onclick="myFunction4();">                   
                    <label>
                        Reservation's
                    </label>
                </div>
                <div class="col-3"  onclick="myFunction5();">                   
                    <label>
                        Reservations To Local Candidates
                    </label>
                </div>
                <div class="col-3" onclick="myFunction6();">                   
                    <label>
                        Definition Of Local Candidates
                    </label>
                </div>               
                <div class="col-3" onclick="myFunction8();">                   
                    <label>
                        Age
                    </label>
                </div>
                <div class="col-3" onclick="myFunction9();">   
                    <label>
                        How To Apply
                    </label>
                </div>
                <div class="col-3" onclick="myFunction10();">                   
                    <label>
                        Fee
                    </label>
                </div>
                <div class="col-3" onclick="myFunction11();">                   
                    <label>
                        Mode of Payment of Fee
                    </label>
                </div>
                <div class="col-3" onclick="myFunction12();">                   
                    <label>
                        Scheme Of Examination
                    </label>
                </div>
                <div class="col-3" onclick="myFunction13();">                   
                    <label>
                        Center for the Examination's
                    </label>
                </div>

                <div class="col-md-12" id="gdt">                   
                    <label>
                        GENERAL DECLARATION
                    </label>
                    <textarea name="declaration" id="form10" class="lg-textarea form-control " rows="5" style="width:100%;"><?php echo $declaration; ?></textarea>
                </div>
                <div class="col-md-12" id="eli">                   
                    <label>
                        ELIGIBILITY
                    </label>
                    <textarea  name = "eligibility" id="form10" class="lg-textarea form-control " rows="5" style="width:100%;"><?php echo $eligibility; ?></textarea>
                </div>
                <div class="col-md-12" id="edu">                   
                    <label>
                        EDUCATIONAL QUALIFICATION
                    </label>
                    <textarea  name="qualification" id="form10" class="lg-textarea form-control " rows="5" style="width:100%;"><?php echo $qualification; ?></textarea>
                </div>
                <div class="col-md-12" id="res">                   
                    <label>
                        RESERVATION'S
                    </label>
                    <textarea   name="reservations" id="form10" class="lg-textarea form-control " rows="5" style="width:100%;"><?php echo $reservations; ?></textarea>
                </div>
                <div class="col-md-12" id="resr">                   
                    <label>
                        RESERVATIONS TO LOCAL CANDIDATES
                    </label>
                    <textarea  name="restolocal"  id="form10" class="lg-textarea form-control " rows="5" style="width:100%;"><?php echo $restolocal; ?></textarea>
                </div>
                <div class="col-md-12" id="def">                   
                    <label>
                        DEFINITION OF LOCAL CANDIDATES
                    </label>
                    <textarea  name="defoflocal"  id="form10" class="lg-textarea form-control " rows="5" style="width:100%;"><?php echo $defoflocal; ?></textarea>
                </div>               
                <div class="col-md-12" id="age">                   
                    <label>
                        AGE
                    </label>
                    <textarea   name = "age" id="form10" class="lg-textarea form-control " rows="5" style="width:100%;"><?php echo $age; ?></textarea>
                </div>
                <div class="col-md-12" id="how">                   
                    <label>
                        HOW TO APPLY
                    </label>
                    <textarea  name="dhowtoapply" id="form10" class="lg-textarea form-control " rows="5" style="width:100%;"><?php echo $dhowtoapply; ?></textarea>
                </div>
                <div class="col-md-12" id="fee">                   
                    <label>
                        FEE
                    </label>
                    <textarea  name="fee" id="form10" class="lg-textarea form-control " rows="5" style="width:100%;"><?php echo $fee; ?></textarea>
                </div>
                <div class="col-md-12" id="mode">                   
                    <label>
                        MODE OF PAYMENT OF FEE
                    </label>
                    <textarea  name="modeofpayment" id="form10" class="lg-textarea form-control " rows="5" style="width:100%;"><?php echo $modeofpayment; ?></textarea>
                </div>
                <div class="col-md-12" id="scheme">                   
                    <label>
                        SCHEME OF EXAMINATION
                    </label>
                    <textarea  name="schemeofexam" id="form10" class="lg-textarea form-control " rows="5" style="width:100%;"><?php echo $schemeofexam; ?></textarea>
                </div>
                <div class="col-md-12" id="center">                   
                    <label>
                        CENTER FOR THE EXAMINATION'S
                    </label>
                    <textarea  name="centers" id="form10" class="lg-textarea form-control " rows="5" style="width:100%;"><?php echo $centers; ?></textarea>
                </div>         

                <div class="col-submit">
                    <button class="submitbtn  text-plain " style="font-size: 20px; height: 50px;" type="submit" name="submit">Post Job</button>
                </div>

            </form>
        </div>
        <!--        <script type="text/javascript">
                    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        
                    elems.forEach(function (html) {
                        var switchery = new Switchery(html);
                    });
                </script>-->

        <script>

//            $("form#postjob").submit(function (event) {
//                let data = $("form#postjob").serialize();
//                console.log(data);
//                alert('ok');
//                $.ajax({
//                    type: "POST",
//                    url: "http://localhost/BharatNext/postjobs.php",
//                    data: data,
//                    success: function (data) {
//                        alert(data);
//                    },
//                    error: function () {
//                        alert("Handler for .submit() called.");
//                    },
//                    dataType: 'html/text',
//                });
//                event.preventDefault();
//            });

            var x1 = document.querySelector("#gdt");
            var x2 = document.querySelector("#eli");
            var x3 = document.querySelector("#edu");
            var x4 = document.querySelector("#res");
            var x5 = document.querySelector("#resr");
            var x6 = document.querySelector("#def");
//            var x7 = document.querySelector("#resl");
            var x8 = document.querySelector("#age");
            var x9 = document.querySelector("#how");
            var x10 = document.querySelector("#fee");
            var x11 = document.querySelector("#mode");
            var x12 = document.querySelector("#scheme");
            var x13 = document.querySelector("#center");




            x1.style.display = "none";
            function myFunction1() {

                x2.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "none";
                x5.style.display = "none";
                x6.style.display = "none";
//                x7.style.display = "none";
                x8.style.display = "none";
                x9.style.display = "none";
                x10.style.display = "none";
                x11.style.display = "none";
                x12.style.display = "none";
                x13.style.display = "none";


                if (x1.style.display === "none") {
                    x1.style.display = "block";
                } else {
                    x1.style.display = "none";
                }
            }

            x2.style.display = "none";
            function myFunction2() {
                x1.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "none";
                x5.style.display = "none";
                x6.style.display = "none";
//                x7.style.display = "none";
                x8.style.display = "none";
                x9.style.display = "none";
                x10.style.display = "none";
                x11.style.display = "none";
                x12.style.display = "none";
                x13.style.display = "none";

                if (x2.style.display === "none") {
                    x2.style.display = "block";
                } else {
                    x2.style.display = "none";
                }
            }

            x3.style.display = "none";
            function myFunction3() {
                x2.style.display = "none";
                x1.style.display = "none";
                x4.style.display = "none";
                x5.style.display = "none";
                x6.style.display = "none";
//                x7.style.display = "none";
                x8.style.display = "none";
                x9.style.display = "none";
                x10.style.display = "none";
                x11.style.display = "none";
                x12.style.display = "none";
                x13.style.display = "none";

                if (x3.style.display === "none") {
                    x3.style.display = "block";
                } else {
                    x3.style.display = "none";
                }
            }

            x4.style.display = "none";
            function myFunction4() {
                x2.style.display = "none";
                x3.style.display = "none";
                x1.style.display = "none";
                x5.style.display = "none";
                x6.style.display = "none";
//                x7.style.display = "none";
                x8.style.display = "none";
                x9.style.display = "none";
                x10.style.display = "none";
                x11.style.display = "none";
                x12.style.display = "none";
                x13.style.display = "none";

                if (x4.style.display === "none") {
                    x4.style.display = "block";
                } else {
                    x4.style.display = "none";
                }
            }

            x5.style.display = "none";
            function myFunction5() {
                x2.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "none";
                x1.style.display = "none";
                x6.style.display = "none";
//                x7.style.display = "none";
                x8.style.display = "none";
                x9.style.display = "none";
                x10.style.display = "none";
                x11.style.display = "none";
                x12.style.display = "none";
                x13.style.display = "none";

                if (x5.style.display === "none") {
                    x5.style.display = "block";
                } else {
                    x5.style.display = "none";
                }
            }
            x6.style.display = "none";
            function myFunction6() {
                x2.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "none";
                x5.style.display = "none";
                x1.style.display = "none";
//                x7.style.display = "none";
                x8.style.display = "none";
                x9.style.display = "none";
                x10.style.display = "none";
                x11.style.display = "none";
                x12.style.display = "none";
                x13.style.display = "none";

                if (x6.style.display === "none") {
                    x6.style.display = "block";
                } else {
                    x6.style.display = "none";
                }
            }
//            x7.style.display = "none";
//            function myFunction7() {
//                x2.style.display = "none";
//                x3.style.display = "none";
//                x4.style.display = "none";
//                x5.style.display = "none";
//                x6.style.display = "none";
//                x1.style.display = "none";
//                x8.style.display = "none";
//                x9.style.display = "none";
//                x10.style.display = "none";
//                x11.style.display = "none";
//                x12.style.display = "none";
//                x13.style.display = "none";
//
//                if (x7.style.display === "none") {
//                    x7.style.display = "block";
//                } else {
//                    x7.style.display = "none";
//                }
//            }
            x8.style.display = "none";
            function myFunction8() {
                x2.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "none";
                x5.style.display = "none";
                x6.style.display = "none";
//                x7.style.display = "none";
                x1.style.display = "none";
                x9.style.display = "none";
                x10.style.display = "none";
                x11.style.display = "none";
                x12.style.display = "none";
                x13.style.display = "none";

                if (x8.style.display === "none") {
                    x8.style.display = "block";
                } else {
                    x8.style.display = "none";
                }
            }
            x9.style.display = "none";
            function myFunction9() {
                x2.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "none";
                x5.style.display = "none";
                x6.style.display = "none";
//                x7.style.display = "none";
                x8.style.display = "none";
                x1.style.display = "none";
                x10.style.display = "none";
                x11.style.display = "none";
                x12.style.display = "none";
                x13.style.display = "none";

                if (x9.style.display === "none") {
                    x9.style.display = "block";
                } else {
                    x9.style.display = "none";
                }
            }
            x10.style.display = "none";
            function myFunction10() {
                x2.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "none";
                x5.style.display = "none";
                x6.style.display = "none";
//                x7.style.display = "none";
                x8.style.display = "none";
                x9.style.display = "none";
                x1.style.display = "none";
                x11.style.display = "none";
                x12.style.display = "none";
                x13.style.display = "none";

                if (x10.style.display === "none") {
                    x10.style.display = "block";
                } else {
                    x10.style.display = "none";
                }
            }
            x11.style.display = "none";
            function myFunction11() {
                x2.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "none";
                x5.style.display = "none";
                x6.style.display = "none";
//                x7.style.display = "none";
                x8.style.display = "none";
                x9.style.display = "none";
                x10.style.display = "none";
                x1.style.display = "none";
                x12.style.display = "none";
                if (x11.style.display === "none") {
                    x11.style.display = "block";
                } else {
                    x11.style.display = "none";
                }
            }
            x12.style.display = "none";
            x13.style.display = "none";

            function myFunction12() {
                x2.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "none";
                x5.style.display = "none";
                x6.style.display = "none";
//                x7.style.display = "none";
                x8.style.display = "none";
                x9.style.display = "none";
                x10.style.display = "none";
                x11.style.display = "none";
                x1.style.display = "none";
                x13.style.display = "none";

                if (x12.style.display === "none") {
                    x12.style.display = "block";
                } else {
                    x12.style.display = "none";
                }
            }
            x13.style.display = "none";
            function myFunction13() {
                x2.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "none";
                x5.style.display = "none";
                x6.style.display = "none";
//                x7.style.display = "none";
                x8.style.display = "none";
                x9.style.display = "none";
                x10.style.display = "none";
                x11.style.display = "none";
                x12.style.display = "none";
                x1.style.display = "none";
                if (x13.style.display === "none") {
                    x13.style.display = "block";
                } else {
                    x13.style.display = "none";
                }
            }

            $(document).ready(function () {

                //this will attach the class to every target 
                $(document).on('click', function (event) {
                    $target = $(event.target);
                    $("*").removeClass("clickbackground");
                    $target.addClass('clickbackground');
                });

            })
        </script>

<?php
include './footer.php';
?>