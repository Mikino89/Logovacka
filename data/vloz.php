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
$meno= htmlspecialchars($_POST['meno']);
$telefon = htmlspecialchars($_POST['telefon']);
$email = htmlspecialchars($_POST['email']);
$color = '';
$datum_cas[] = '';

if(empty($datum) || empty($cas) || empty($meno) || empty($telefon) || empty($email))
    die("error");
/*
function isEmail($to_validate)
{
  $RegExp ="/^([a-zA-Z0-9_\-])+(\.([a-zA-Z0-9_\-])+)*@((\[(((([0-1])?";
  $RegExp.="([0-9])?[0-9])|(2[0-4][0-9])|(2[0-5][0-5])))\.(((([0-1])?";
  $RegExp.="([0-9])?[0-9])|(2[0-4][0-9])|(2[0-5][0-5])))\.(((([0-1])?";  
  $RegExp.="([0-9])?[0-9])|(2[0-4][0-9])|(2[0-5][0-5])))\.(((([0-1])?"; 
  $RegExp.="([0-9])?[0-9])|(2[0-4][0-9])|(2[0-5][0-5]))\]))|";
  $RegExp.="((([a-zA-Z0-9])+(([\-])+([a-zA-Z0-9])+)*\.)+([a-zA-Z])+";
  $RegExp.= "(([\-])+([a-zA-Z0-9])+)*))$/";
  return preg_match($RegExp,$to_validate);
}

if(isEmail($email) == 0){
    echo('error');
}
*/
$query = "INSERT INTO zaznamy (datum, cas, meno, telefon, email, stav) VALUES('$datum', '$cas', '$meno', '$telefon', '$email', 1)";
$ok = mysqli_query($mysqli, $query);

if ($ok)
    echo "ok";
else
    echo "error";

?>
