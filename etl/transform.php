<?php
include_once('../header.php');
include_once('etlFunctions.php');
?>

<section class="resume-section p-3 p-lg-5 d-flex flex-column">
<div class="my-auto">
<div class="row my-auto">
    <div class="col-md-12">
        <h2>Transform</h2>
    </div>
</div>
<div class="row">
<div class="col-md-12">
<?php

$lastEtlStatus = getLastEtlStatus();

if($lastEtlStatus['lastStatus'] != 'E'){
    echo "Nie mozna wykonac etapu TRANSFORM, ponieważ ostatni proces ETL (lub sam etap Extract) nie został zakończony.<br /><br />";
    echo "Ostatni etap: ".$lastEtlStatus['lastStatus']."<br />";
    echo "Data ostatniego etapu: ".$lastEtlStatus['lastStatusDate']."<br />";
}else{
    transformStep();
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