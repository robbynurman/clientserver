<?php
include_once(__DIR__."/../lib/Employee.php");
include_once(__DIR__."/../lib/DataFormat.php");
header('Access-Control-Allow-Origin:*');
$emp = new Employee();
if(isset($_GET['employee_id'])){
    $data=$emp->getEmployee($_GET['employee_id']);
} else {
    $data=$emp->getAll();
}
$format=new DataFormat();

if($_GET['view']=='xml'){
    header('Content-Type: application/xml; charset=utf-8');
    echo $format->asXML($data,'Employee');
} else if ($_GET['view']=='json'){
    header('Content-Type: application/json');
    echo $format->asJSON($data);
} else {
    echo $format->asHTML($data);
}

