<?php
include './header.php';
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
include './DbConnection.php';
$db = new Db();
$retres = array();


function clean($string) {
    $string = str_replace(" ", "-", $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
?>



<?php
//include './footer.php';
?>