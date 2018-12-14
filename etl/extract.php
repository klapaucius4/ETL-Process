<?php

/*
 * Link: https://www.pracuj.pl/praca/programista;kw/ostatnich%2024h;
 */

// set_time_limit(3600);
// ini_set('memory_limit', '-1');

include_once('../config.php');
include_once('../lib/simple_html_dom.php');


$fp = fopen('../data_from_extract.csv', 'w');

fputcsv($fp, array(
    'Advert ID',        // Identyfikator ogłoszenia
    'Advert title',     // Tytuł ogłoszenia
    'Date of addition', // Data dodania
    'Location',         // Lokalizacja
    'By',               // Ogłaszane przez
    'Type of work',     // Rodzaj pracy
    'Type of contract', // Rodzaj umowy
    'Content',           // Treść ogłoszenia
    '|'
    )
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
           'content' => '-'
        );
        
        $adIdArray = $jobAdvertHtml->find('input[name=adId]');
        if(array_key_exists(0, $adIdArray) && $adId = $adIdArray[0]->value){
            $productData['id'] = $adId;
        }else{
            continue;
        }

        $titleArray = $jobAdvertHtml->find('h1.item-title span.myAdTitle');
        if(array_key_exists(0, $titleArray) && $title = $titleArray[0]->plaintext){
            $productData['title'] = preg_replace('/\s+/', '', $title);
        }

        $dateArray = $jobAdvertHtml->find('ul.selMenu li span.value');
        if(array_key_exists(0, $dateArray) && $date = $dateArray[0]->plaintext){
            $productData['date'] = preg_replace('/\s+/', '', $date);
        }

        $locationArray = $jobAdvertHtml->find('ul.selMenu li span.value');
        if(array_key_exists(1, $locationArray) && $location = $locationArray[1]->plaintext){
            $productData['location'] = preg_replace('/\s+/', '', $location);
        }

        $byArray = $jobAdvertHtml->find('ul.selMenu li span.value');
        if(array_key_exists(2, $byArray) && $by = $byArray[2]->plaintext){
            $productData['by'] = preg_replace('/\s+/', '', $by);
        }

        $typeOfWorkArray = $jobAdvertHtml->find('ul.selMenu li span.value');
        if(array_key_exists(3, $typeOfWorkArray) && $typeOfWork = $typeOfWorkArray[3]->plaintext){
            $productData['type_of_work'] = preg_replace('/\s+/', '', $typeOfWork);
        }

        $typeOfContractArray = $jobAdvertHtml->find('ul.selMenu li span.value');
        if(array_key_exists(4, $typeOfContractArray) && $typeOfContract = $typeOfContractArray[4]->plaintext){
            $productData['type_of_contract'] = preg_replace('/\s+/', '', $typeOfContract);
        }

        $contentArray = $jobAdvertHtml->find('div.vip-details div.description');
        if(array_key_exists(0, $contentArray) && $content = $contentArray[0]->plaintext){
            $productData['content'] = preg_replace('/\s+/', '', $content);
        }


        fputcsv($fp, $productData, '|');
    }

}

?>