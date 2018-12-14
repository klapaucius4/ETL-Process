<?php

$row = 1;
if (($handle = fopen("../data_from_extract.csv", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $num = count($data);
    $row++;
    for ($c=0; $c < $num; $c++) {
        echo $data[$c] . "<br />";
    }
  }
  fclose($handle);
}