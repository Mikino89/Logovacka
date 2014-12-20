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
$meno= trim($_POST['meno']);
$telefon = str_replace(' ', '', $_POST['telefon']);
$email = trim($_POST['email']);
$color = '';
$datum_cas[] = '';
$stv = 1;

if(empty($datum) || empty($cas) || empty($meno) || empty($telefon) || empty($email))
    die("error");

    $zapis = mysqli_prepare($mysqli, "INSERT INTO zaznamy (datum, cas, meno, telefon, email, stav) VALUES(?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($zapis, 'sssssi', $datum, $cas, $meno, $telefon, $email, $stv);
    mysqli_stmt_execute($zapis);



if ($zapis)
    echo "ok";
else
    echo "error";

?>
