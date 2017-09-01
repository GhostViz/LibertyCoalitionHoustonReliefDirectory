<?
session_start();
if($_SESSION["loggedin"] == "yes") {

}
else {
  echo header("Location: http://thelibertycoalition.org/");
}
include_once 'includes/connection.php';

$organization = $_POST['organization'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];
$contactperson = $_POST['contactperson'];
$phonenumber = $_POST['phonenumber'];
$website = $_POST['website'];
$otherinfo = $_POST['otherinfo'];
try {
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO reliefagencies (organization, address, city, state, zipcode, contactperson, phonenumber, website, otherinfo)
    VALUES ('".$organization."', '".$address."', '".$city."', '".$state."', '".$zipcode."', '".$contactperson."', '".$phonenumber."', '".$website."', '".$otherinfo."')";
    // use exec() because no results are returned
    $pdo->exec($sql);
    echo header("Location: http://thelibertycoalition.org/admin.php?added=1");
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$pdo = null;
?>
