<?php
include './header.php';
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
include './DbConnection.php';
$db = new Db();
$retres = array();

$name = "";
$pfrom = "";
$category = "";
$age = "";
$gender = "";
$cast = "";
$state = "";
$district = "";
$sub_district = "";
$ward = "";
$details = "";
$whom = "";
$policyid = "";


if (isset($_GET) && isset($_GET['policyid'])) {
    $policyid = $_GET['policyid'];
    $resget = $db->query("select * from policies where policyid = :policyid", [":policyid" => $policyid]);
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
        if (!isset($policyid) || empty($policyid)) {
            $dbrest = $db->query("insert into policies(name,pfrom,category,age,gender,cast,state,district,sub_district,ward,details,whom)"
                    . " values(:name,:pfrom,:category,:age,:gender,:cast,:state,:district,:sub_district,:ward,:details,:whom)", ["whom" => $whom, ":name" => $name, ":pfrom" => $pfrom, ":category" => $category, ":age" => $age, ":gender" => $gender, ":cast" => $cast, ":state" => $state, ":district" => $district, ":sub_district" => $sub_district, ":ward" => $ward, ":details" => $details]); //->get();
        } else {
            $dbrest = $db->query("update policies  set name = :name,pfrom = :pfrom,category = :category,age = :age,gender = :gender,cast = :cast,state = :state,district = :district,sub_district = :sub_district,ward = :ward,details = :details,whom = :whom where policyid = :policyid", ['policyid'=>$policyid,"whom" => $whom, ":name" => $name, ":pfrom" => $pfrom, ":category" => $category, ":age" => $age, ":gender" => $gender, ":cast" => $cast, ":state" => $state, ":district" => $district, ":sub_district" => $sub_district, ":ward" => $ward, ":details" => $details]); //->get();
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
<!--<!Doctype html>
<html lang = "en-US">
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "Content-Type" content = "text/html"> 
        <title>BharatNext</title>
        <meta name = "author" content = "Jake Rocheleau"> 
        <link rel = "shortcut icon" href = "http://static.tmimgcdn.com/img/favicon.ico">
        <link rel = "icon" href = "http://static.tmimgcdn.com/img/favicon.ico"> 
        <link rel = "stylesheet" type = "text/css" media = "all" href = "css/styles.css">
        <link rel = "stylesheet" type = "text/css" media = "all" href = "css/switchery.min.css"> 
        <link rel = "stylesheet" type = "text/css" media = "all" href = "bootstrap-4.0.0/dist/css/bootstrap.min.css">
        <script type = "text/javascript" src = "js/switchery.min.js"></script>
        <script type="text/javascript" src="js/jquery.3.3.1.min.js"></script>
        <script type="text/javascript" src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    </head>

    <body>-->
        <div id="wrapper">

            <h1><?php echo empty($policyid) ? "Policy Posting" : "Policy Editing" ?></h1>

            <form  name="postjob" id="postjob"  method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
                <input type="hidden" name="policyid" value="<?php echo $policyid ?>" > 
                <div class="col-3">
                    <label>
                        Policy Name
                        <input type="text" placeholder="Enter Policy Name" id="name" name="name" tabindex="1" value="<?php echo $name; ?>" >
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Policy From
                        <input type="text" placeholder="Enter Policy From Details" id="pfrom" name="pfrom" tabindex="2" value="<?php echo $pfrom; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Policy Category
                        <input type="text" placeholder="Enter Policy Category" id="category" name="category" tabindex="2" value="<?php echo $category; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Age
                        <input type="number" maxlength="3" placeholder="Enter Age" id="age" name="age" tabindex="1" value="<?php echo $age; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Gender
                        <input type="text" placeholder="Enter Gender" id="gender" name="gender" tabindex="1" value="<?php echo $gender; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Caste
                        <input type="text" placeholder="Enter Caste" id="cast" name="cast" tabindex="1" value="<?php echo $cast; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        State
                        <input type="text" placeholder="Enter State" id="state" name="state" tabindex="1" value="<?php echo $state; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        District
                        <input type="text" placeholder="Enter District" id="district" name="district" tabindex="1" value="<?php echo $district; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Sub_District
                        <input type="text" placeholder="Enter Sub District for job" id="sub_district" name="sub_district" tabindex="1" value="<?php echo $sub_district; ?>">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Ward
                        <input type="text" placeholder="Enter Ward" id="ward" name="ward" tabindex="1" value="<?php echo $ward; ?>">
                    </label>
                </div>              
                <div class="col-3">
                    <label>
                        Whom
                        <input type="text" placeholder="Policy Whome" id="whom" name="whom" tabindex="1" value="<?php echo $whom ?>">
                    </label>
                </div>              


                <div class="col-md-12" onclick="myFunction();">                   
                    <label>
                        Policy Details
                    </label>
                </div>   

                <div class="col-md-12" id="detailsarea">               

                    <textarea  placeholder="Enter Policy Details Here" name="details" class="lg-textarea form-control " rows="5" style="width:100%;"><?php echo $details; ?></textarea>
                </div>

                <div class="col-submit">
                    <button class="submitbtn  text-plain " style="font-size: 20px; height: 50px;" name="submit" type="submit">Post Policy</button>
                </div>

            </form>
        </div>      

        <script>

//            $("form#postjob").submit(function (event) {
//                let data = $("form#postjob").serialize();
//                console.log(data);
//                alert('ok');
//                $.ajax({
//                    type: "POST",
//                    url: "http://localhost/BharatNext/postpolicy.php",
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

            var x = document.querySelector("#detailsarea");
            x.style.display = "none";
            function myFunction() {
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }


            //            $(document).ready(function () {
            //
            //                //this will attach the class to every target 
            //                $(document).on('click', function (event) {
            //                    $target = $(event.target);
            //                    $("*").removeClass("clickbackground");
            //                    $target.addClass('clickbackground');
            //                });
            //
            //            })
        </script>

<?php
include './footer.php';
?>