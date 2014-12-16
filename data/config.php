<?php
$mysqli=mysqli_connect(SQL_HOST,SQL_USER,SQL_PASSWORD);
if (!$mysqli) {die ('ZLE ZADANY NAZOV SERVERU, UZ.MENA ALEBO HESLA');}
$mysqli2=mysqli_select_db($mysqli,SQL_DB) or die ('ZLE ZADANY NAZOV DATABAZY');
$kodovanie=mysqli_query($mysqli,"SET NAMES 'UTF-8'");
?>