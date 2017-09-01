<?
session_start();
if($_SESSION["loggedin"] == "yes") {

}
else {
  echo header("Location: http://thelibertycoalition.org/");
}
include_once 'includes/connection.php';

$id = $_POST['id'];
$organization = $_POST['organization'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];
$contactperson = $_POST['contactperson'];
$phonenumber = $_POST['phonenumber'];
$itemsavailable = $_POST['items'];
$itemsneeded = $_POST['itemsneeded'];
$otherinfo = $_POST['otherinfo'];
try {
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE donationdropoff SET organization='$organization', address='$address', city='$city', state='$state', zipcode='$zipcode', contactperson='$contactperson', phonenumber='$phonenumber', items='$itemsavailable', itemsneeded='$itemsneeded', otherinfo='$otherinfo' WHERE id='$id'";
    // use exec() because no results are returned
    $pdo->exec($sql);
    echo header("Location: http://thelibertycoalition.org/admindistribution.php?edited=1");
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$pdo = null;
?>
