<?php
include_once('etlFunctions.php');
?>
    <?php
    $con = mysqlConnect();
    $query 	= mysqli_query($con, 'SELECT * FROM `job_adverts`');

    $data = array();

    while($row = mysqli_fetch_array($query)) {
        $data[] = array(
            $row[0],
            $row[1],
            $row[2],
            $row[3],
            $row[4],
            $row[5],
            $row[6],
            $row[7],
        );
    }


    $output = fopen("php://output",'w') or die("Can't open php://output");
    header("Content-Type:application/csv"); 
    header("Content-Disposition:attachment;filename=dataFromDatabase.csv"); 
    fputcsv($output, array(
        'Id w bazie',
        'Id z Gumtree',
        'Tytuł ogłoszenia',
        'Data dodania',
        'Lokalizacja',
        'Ogłaszane przez',
        'Rodzaj pracy',
        'Rodzaj umowy',
    ));

    foreach($data as $d) {
        fputcsv($output, $d);
    }
    fclose($output) or die("Can't close php://output");

    ?>

<?php

?>