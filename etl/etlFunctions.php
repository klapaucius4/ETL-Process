<?php

function setLastEtlStatus($status){
    $fp = fopen('etlStatus.json', 'w');
    $data = array(
        'lastStatus' => $status,
        'lastStatusDate' => date("Y-m-d H:i:s")
    );
    fwrite($fp, json_encode($data));
    fclose($fp);
}

function getLastEtlStatus(){
    $fp = fopen('etlStatus.json', 'r');
    $data = array();
    $json = fgets($fp);
    $data = json_decode($json, true);
    return $data;
}