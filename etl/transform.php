<?php

if(!file_exists('../data_from_extract.csv')){
    echo "Nie znaleziono pliku <strong>data_from_extract.csv</strong>. Prawdopodobnie proces 'Extract' nie zostal jeszcze wykonany lub probujesz wywolac proces 'Transform' kolejny raz pod rzad.";
    exit;
}
$row = 1;
$allData = array();
if (($handle = fopen("../data_from_extract.csv", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 1000, "|")) !== FALSE) {
    $allData[] = $data;
  }

    // $data = fgetcsv($handle, 1000, "|");
    fclose($handle);
}

if($allData) {
    $fp = fopen('../data_from_transform.csv', 'w');
    foreach($allData as $d){
        fputcsv($fp, $d, '|');
    }
    fclose($fp);

    unlink('../data_from_extract.csv');

    echo "Dane zostaly przeksztalcone i zapisane do pliku <strong>data_from_transform.csv</strong>.<br />Zostal usuniety tez tymczasowy plik <strong>data_from_extract.csv</strong>, ktory przechowywal dane z procesu 'Extract'.<br />";
    
    $dataFromTransformUrl = 'http://'.$_SERVER['SERVER_NAME'].'/data_from_transform.csv';
    echo "<a href='". $dataFromTransformUrl."' download>data_from_transform.csv</a>";
}
