<?php
require '../connection.php';
$date = date("Y-m-d");
$mode = $_REQUEST["mode"];
if ($mode == "insert_data") {
    $main_meet = $_REQUEST['main_meet'];
    $main_source = $_REQUEST['main_source'];
    $main_pick = $_REQUEST['main_pick'];
    $main_day = $_REQUEST['main_day'];

    // multiple form
    $agency_id = empty($_REQUEST["agency_id"]) ? [] : $_REQUEST['agency_id'];

    $sql = "INSERT INTO main_tb (main_meet , main_source , main_create , main_pick , main_day) VALUES ( '$main_meet' ,'$main_source' , '$date' , '$main_pick' ,'$main_day') ";
    $query = sqlsrv_query($conn, $sql);

    $sqlmaxid = "SELECT @@IDENTITY AS 'Maxid'";
    $querymax = sqlsrv_query($conn, $sqlmaxid);
    $resultMaxid = sqlsrv_fetch_array($querymax, SQLSRV_FETCH_ASSOC);
    $main_id =  $resultMaxid['Maxid'];

    $countagency = count($agency_id);
    for($i = 0 ; $i < $countagency ; $i++){
        $agencyid = $agency_id[$i];
        if(trim($agencyid) <> "" ){
            $sql1 = "INSERT INTO dimen_agency (agency_id , main_id) VALUES ('$agencyid' , '$main_id')" ; 
            $query1 = sqlsrv_query($conn , $sql1);
        }
    }
}

