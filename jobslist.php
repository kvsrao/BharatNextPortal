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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>

    <body>-->
<div id="wrapper" class="container">

    <h1>List Of Jobs</h1>

    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>SLNO</th>
                <th>Name</th>
                <th>Title</th>
                <th>Opening Date</th>
                <th>Closing Date Date</th>
                <th>Vacancies</th>
                <th>Operatinos</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $restable = $db->query("select * from notifications");
            if ($restable->result->rowCount() > 0) {
                $restables = $restable->get();
                foreach ($restables as $rest) {
                    ?>
                    <tr>
                        <td><?php echo $rest->jobid; ?></td>
                        <td><?php echo $rest->department; ?></td>
                        <td><?php echo $rest->jobtitle; ?></td>
                        <td><?php echo $rest->openingdate; ?></td>
                        <td><?php echo $rest->closingdate; ?></td>
                        <td><?php echo $rest->vacancies; ?></td>
                        <td class="text-center"><a href="postjobs.php?jobid=<?php echo $rest->jobid; ?> ">  <i class="fas fa-external-link-alt mr-3"></i></a><i class="fas fa-trash-alt"></i></td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5">NO Records Found</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>           
</div>


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