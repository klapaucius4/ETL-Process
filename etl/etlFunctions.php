<?php
include_once('../config.php');
include_once('../lib/simple_html_dom.php');

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


function mysqlConnect(){
    $con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if (!$con) {
        echo "Error: " . mysqli_connect_error();
        // exit();
        return false;
    }

    mysqli_set_charset($con, "utf8");
    return $con;
}




// extractStep function
function extractStep(){

    echo "<strong>1. Zaczynamy proces EXTRACT</strong><br /><br />";

    $fp = fopen('../data_from_extract.csv', 'w');

    fputcsv($fp, array(
        'Advert ID',        // Identyfikator ogłoszenia
        'Advert title',     // Tytuł ogłoszenia
        'Date of addition', // Data dodania
        'Location',         // Lokalizacja
        'By',               // Ogłaszane przez
        'Type of work',     // Rodzaj pracy
        'Type of contract', // Rodzaj umowy
        //'Content',           // Treść ogłoszenia
    ),
    '|'
    );

    $productNumber = 0;

    for($pageNumer = 1; $pageNumer <= HOW_MANY_PAGES_TO_EXTRACT; $pageNumer++){

        $urlToWebsite = URL_TO_GUMTREE.URL_TO_GUMTREE_CATEGORY.$pageNumer;

        $html = file_get_html(utf8_encode($urlToWebsite));

        $list = $html->find('div.view ul');
        $links = $list[1]->find('li .title a');


        foreach ($links as $link){

            $jobAdvertHtml = $html = file_get_html(utf8_encode(URL_TO_GUMTREE.$link->href));

            $productData = array(
            'id' => '-',
            'title' => '-',
            'date' => '-',
            'location' => '-',
            'by' => '-',  
            'type_of_work' => '-', 
            'type_of_contract' => '-',
            //'content' => '-'
            );
            
            $adIdArray = $jobAdvertHtml->find('input[name=adId]');
            if(array_key_exists(0, $adIdArray) && $adId = $adIdArray[0]->value){
                $productData['id'] = trim(preg_replace('/\s\s+/', '', $adId));
            }else{
                continue;
            }

            $titleArray = $jobAdvertHtml->find('h1.item-title span.myAdTitle');
            if(array_key_exists(0, $titleArray) && $title = $titleArray[0]->plaintext){
                $productData['title'] = trim(preg_replace('/\s\s+/', '', $title));
            }

            $dateArray = $jobAdvertHtml->find('ul.selMenu li span.value');
            if(array_key_exists(0, $dateArray) && $date = $dateArray[0]->plaintext){
                $productData['date'] = trim(preg_replace('/\s\s+/', '', $date));
            }

            $locationArray = $jobAdvertHtml->find('ul.selMenu li span.value');
            if(array_key_exists(1, $locationArray) && $location = $locationArray[1]->plaintext){
                $productData['location'] = trim(preg_replace('/\s\s+/', '', $location));
            }

            $byArray = $jobAdvertHtml->find('ul.selMenu li span.value');
            if(array_key_exists(2, $byArray) && $by = $byArray[2]->plaintext){
                $productData['by'] = trim(preg_replace('/\s\s+/', '', $by));
            }

            $typeOfWorkArray = $jobAdvertHtml->find('ul.selMenu li span.value');
            if(array_key_exists(3, $typeOfWorkArray) && $typeOfWork = $typeOfWorkArray[3]->plaintext){
                $productData['type_of_work'] = trim(preg_replace('/\s\s+/', '', $typeOfWork));
            }

            $typeOfContractArray = $jobAdvertHtml->find('ul.selMenu li span.value');
            if(array_key_exists(4, $typeOfContractArray) && $typeOfContract = $typeOfContractArray[4]->plaintext){
                $productData['type_of_contract'] = trim(preg_replace('/\s\s+/', '', $typeOfContract));
            }

            // $contentArray = $jobAdvertHtml->find('div.vip-details div.description');
            // if(array_key_exists(0, $contentArray) && $content = $contentArray[0]->plaintext){
            //     $productData['content'] = preg_replace('/\s\s+/', '', $content);
            // }

            fputcsv($fp, $productData, '|');
        }

    }

    fclose($fp);
    
    $dataFromExtractformUrl = 'http://'.$_SERVER['SERVER_NAME'].'/data_from_extract.csv';
    echo "Dane zostaly pobrane z serwisu Gumtree i zapisane do pliku <a href='".$dataFromExtractformUrl."'>data_from_extract.csv</a>.<br /><br />";

    setLastEtlStatus('E');


    // $simpleHtmlDomUrl = 'http://'.$_SERVER['SERVER_NAME'].'/simple_html_dom.csv';

    return true;

}

function transformStep(){

    echo "<strong>2. Zaczynamy proces TRANSFORM</strong><br /><br />";

    // if(!file_exists('../data_from_extract.csv')){
    //     echo "Nie znaleziono pliku <strong>data_from_extract.csv</strong>. Prawdopodobnie proces 'Extract' nie zostal jeszcze wykonany lub probujesz wywolac proces 'Transform' kolejny raz pod rzad.";
    //     return false;
    // }

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

        $dataFromTransformUrl = 'http://'.$_SERVER['SERVER_NAME'].'/data_from_transform.csv';
    
        echo "Dane zostaly przeksztalcone i zapisane do pliku <a href='". $dataFromTransformUrl."' download>data_from_transform.csv</a>.<br />Zostal usuniety tez tymczasowy plik <strong>data_from_extract.csv</strong>, ktory przechowywal dane z procesu 'Extract'.<br />";
        

        echo "<br /><br />";

        setLastEtlStatus('T');

        return true;
    }


}

function loadStep(){
    echo "<strong>3. Zaczynamy proces LOAD</strong><br /><br />";

    // if(!file_exists('../data_from_transform.csv')){
    //     echo "Nie znaleziono pliku <strong>data_from_transform.csv</strong>. Prawdopodobnie proces 'Transform' nie zostal jeszcze wykonany lub probujesz wywolac proces 'Load' kolejny raz pod rzad.";
    //     return false;
    // }

    $allData = array();
    if (($handle = fopen("../data_from_transform.csv", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, "|")) !== FALSE) {
        $allData[] = $data;
      }
    
        fclose($handle);
    }
    
    // Open Connection
    $con = mysqlConnect();
    if(!$con){
        return false;
    }
    

    $firstRow = true;
    foreach($allData as $advert){
        if($firstRow){
            $firstRow = false;
            continue;
        }
        $query 	= mysqli_query($con, 'SELECT * FROM `job_adverts` WHERE `gumtree_id` = "'.$advert[0].'"');
        $row = mysqli_fetch_array($query);
        if(!$row){
            $insert = mysqli_query($con, 'INSERT INTO `job_adverts` (`gumtree_id`, `title`, `date`, `location`, `by`, `type_of_work`, `type_of_contact`) VALUES ("'.$advert[0].'", "'.$advert[1].'", "'.$advert[2].'", "'.$advert[3].'", "'.$advert[4].'", "'.$advert[5].'", "'.$advert[6].'" )');
            if($insert){
                echo "Ogłoszenie od ID ". $advert[0] . " zostało zapisane do bazy.<br />";
            }
        }else{
            echo "Ogłoszenie od ID ". $advert[0] . " znajduje się już w bazie danych, więc nie zostaje ono dodane.<br />";
        }
    }

    mysqli_close ($con);

    unlink('../data_from_transform.csv');

    echo "<br /><br />Dane zostały zapisane do bazy danych mysql.
    <br />
    Zostal usuniety tez tymczasowy plik <strong>data_from_transform.csv</strong>, ktory przechowywal dane z procesu 'Transform'.<br />
    W tej chwili można znów wykonać cały proces ETL od początku lub sam etap 'Extract'
    ";

    setLastEtlStatus('L');

    return true;
}
