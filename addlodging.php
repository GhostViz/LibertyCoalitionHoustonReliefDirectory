<?
session_start();
if($_SESSION["loggedin"] == "yes") {

}
else {
  echo header("Location: http://thelibertycoalition.org/");
}
include_once 'includes/connection.php';

$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];
$contactperson = $_POST['contactperson'];
$phonenumber = $_POST['phonenumber'];
$otherinfo = $_POST['otherinfo'];
try {
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO housing (contactperson, phonenumber, city, state, zipcode, otherinfo)
    VALUES ('".$contactperson."', '".$phonenumber."', '".$city."', '".$state."', '".$zipcode."', '".$otherinfo."')";
    // use exec() because no results are returned
    $pdo->exec($sql);
    echo header("Location: http://thelibertycoalition.org/adminlodging.php?added=1");
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$pdo = null;
?>
