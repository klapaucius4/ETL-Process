<?php
include_once('../header.php');
include_once('etlFunctions.php');
?>

<section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
<div class="my-auto">

    <div class="row my-auto">
        <div class="col-md-12 mb-2">
            <h2>Czyszczenie bazy danych</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <?php
        $con = mysqlConnect();
        $query 	= mysqli_query($con, 'DELETE FROM `job_adverts`');
        if($query){
            echo "Wyczyszczono całą bazę danych.";
        }
        ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <a href="/#application" class="btn btn-info mt-5">Powrót</a>
        </div>
    </div>
</div>
</section>

<?php
include_once('../footer.php');

?>