<?php
include_once('../header.php');
include_once('etlFunctions.php');
?>

<section class="resume-section p-3 p-lg-5 d-flex flex-column">
<div class="my-auto">
<div class="row">
    <div class="col-md-12">
        <h2>Extract -> Transform -> Load</h2>
    </div>
</div>
<div class="row">
<div class="col-md-12">
<?php

$lastEtlStatus = getLastEtlStatus();

if($lastEtlStatus['lastStatus'] != 'L'){
    echo "Nie mozna wykonac całego procesu ETK, ponieważ ostatni proces ETL (lub sam etap Load) nie został zakończony.<br /><br />";
    echo "Ostatni etap: ".$lastEtlStatus['lastStatus']."<br />";
    echo "Data ostatniego etapu: ".$lastEtlStatus['lastStatusDate']."<br />";
}else{
    if(extractStep()){
        if(transformStep()){
            loadStep();
        }
    };
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