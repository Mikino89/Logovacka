<?php
require_once('db.php');
require_once('config.php');

if (!isset($_POST))
    die("error");

if (!isset($_POST['datum']) || !isset($_POST['cas']) || !isset($_POST['meno']) ||
    !isset($_POST['telefon']) || !isset($_POST['email']))
    die("error");

$datum = date_format(new DateTime($_POST['datum']), 'Y-m-d');
$cas = $_POST['cas'];
$meno= $_POST['meno'];
$telefon = $_POST['telefon'];
$email = $_POST['email'];
$color = '';
$datum_cas[] = '';

if(empty($datum) || empty($cas) || empty($meno) || empty($telefon) || empty($email))
    die("error");


$query = "INSERT INTO zaznamy (datum, cas, meno, telefon, email, stav) VALUES('$datum', '$cas', '$meno', '$telefon', '$email', 1)";
$ok = mysqli_query($mysqli, $query);

if ($ok)
    echo "ok";
else
    echo "error";

?>
