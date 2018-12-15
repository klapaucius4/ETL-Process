<?php
if(!file_exists('../data_from_transform.csv')){
    echo "Nie znaleziono pliku <strong>data_from_transform.csv</strong>. Prawdopodobnie proces 'Transform' nie zostal jeszcze wykonany lub probujesz wywolac proces 'Load' kolejny raz pod rzad.";
    exit;
}

require_once('../config.php');

// Open Connection
$con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

// Some Query
$sql 	= 'SELECT * FROM product';
$query 	= mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($query))
{
	echo $row['id'];
}

// Close connection
mysqli_close ($con);
?>