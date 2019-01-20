<!Doctype html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <!--<meta http-equiv="Content-Type" content="text/html">-->
        <title>BharatNext</title>
        <!--<meta name="author" content="Jake Rocheleau">-->
        <!--        <link rel="shortcut icon" href="http://static.tmimgcdn.com/img/favicon.ico">
                <link rel="icon" href="http://static.tmimgcdn.com/img/favicon.ico">-->
        <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
        <!--<link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">-->
        <link rel="stylesheet" type="text/css" media="all" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
        <!--<script type="text/javascript" src="js/switchery.min.js"></script>-->
        <script type="text/javascript" src="js/jquery.3.3.1.min.js"></script>
        <script type="text/javascript" src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <style>
            input[type="text"],input[type="date"],button,input[type="submit"]{
                width:250px;
                height: 40px;
                margin:5px;
                margin-left: 5px;
                margin-right: 5px;
                padding:3px;
                color:#000;
                display: inline;
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <!-- Brand -->
            <div class="container">
                <a class="navbar-brand" href="index.php">BHARAT NEXT</a>

                <!-- Links -->
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="userslisting.php">Registered Users</a>
                    </li>

                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Jobs
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="jobslist.php">Jobs List</a>
                            <a class="dropdown-item" href="postjobs.php">Add New Job</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Policies
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="policyeslist.php">Policies List</a>
                            <a class="dropdown-item" href="postpolicy.php">Add New Policy</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <br>