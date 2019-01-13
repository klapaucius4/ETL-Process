<?php
include_once('../header.php');
include_once('etlFunctions.php');
?>

<section class="p-3 p-lg-5 d-flex flex-column">
<div class="row my-auto">
    <div class="col-md-12">
        <h2>Dane z bazy danych</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <?php
    $con = mysqlConnect();
    $query 	= mysqli_query($con, 'SELECT * FROM `job_adverts`');
    ?>
        <table id="tableWithDataFromDatabase" class="display">
            <thead>
                <tr>
                    <th>Id w bazie</th>
                    <th>Id z Gumtree</th>
                    <th>Tytuł</th>
                    <th>Data dodania ogłoszenia</th>
                    <th>Lokalizacja</th>
                    <th>Ogłaszane przez</th>
                    <th>Rodzaj pracy</th>
                    <th>Rodzaj umowy</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_array($query)): ?>
                <tr>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td><?php echo $row[4]; ?></td>
                    <td><?php echo $row[5]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><?php echo $row[7]; ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <a href="/#application" class="btn btn-info mt-5">Powrót</a>
    </div>
</div>

</section>

<?php
include_once('../footer.php');

?>