<?php

include './DbConnection.php';
$db = new Db();

function xlsBOF() {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    return;
}

function xlsEOF() {
    echo pack("ss", 0x0A, 0x00);
    return;
}

function xlsWriteNumber($Row, $Col, $Value) {
    echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
    echo pack("d", $Value);
    return;
}

function xlsWriteLabel($Row, $Col, $Value) {
    $L = strlen($Value);
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value;
    return;
}

// Send Header
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=users-list.xls ");
header("Content-Transfer-Encoding: binary ");

// XLS Data Cell
$key = $_GET['query'];


xlsBOF();
xlsWriteLabel(0, 0, "S.No");
xlsWriteLabel(0, 1, "Order ID");
xlsWriteLabel(0, 2, "User");
xlsWriteLabel(0, 3, "Email");
xlsWriteLabel(0, 4, "Dob");
xlsWriteLabel(0, 5, "Cast");
xlsWriteLabel(0, 6, "State");
xlsWriteLabel(0, 7, "City");
xlsWriteLabel(0, 8, "Gender");
xlsWriteLabel(0, 9, "Marital Status");
xlsWriteLabel(0, 10, "Grand Total");
xlsWriteLabel(0, 10, "Pin");
xlsWriteLabel(0, 10, "Qualification");


$xlsRow = 1;

$xltabs = $db->query($key);

if ($xltabs->result->rowCount() > 0) {
    $xlrows = $xltabs->get();
    foreach ($xlrows as $res) {
        xlsWriteNumber($xlsRow, 0, "$xlsRow");
        xlsWriteLabel($xlsRow, 1, "$res->name");
        xlsWriteLabel($xlsRow, 2, "$res->email");
        xlsWriteLabel($xlsRow, 3, "$res->dob");
        xlsWriteLabel($xlsRow, 4, "$res->cast");
        xlsWriteLabel($xlsRow, 5, "$res->state");
        xlsWriteLabel($xlsRow, 6, "$res->city");
        xlsWriteLabel($xlsRow, 7, "$res->gender");
        xlsWriteLabel($xlsRow, 8, "$res->mstatus");
        xlsWriteLabel($xlsRow, 9, "$res->pin");
        xlsWriteLabel($xlsRow, 10, "$res->qualification");
        $xlsRow++;
    }
}


xlsEOF();
exit();
?>