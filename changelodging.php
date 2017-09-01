<?
session_start();
if($_SESSION["loggedin"] == "yes") {

}
else {
  echo header("Location: http://thelibertycoalition.org/");
}
include_once 'includes/connection.php';

$id = $_POST['id'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];
$contactperson = $_POST['contactperson'];
$phonenumber = $_POST['phonenumber'];
$otherinfo = $_POST['otherinfo'];
try {
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE housing SET contactperson='$contactperson', phonenumber='$phonenumber', city='$city', state='$state', zipcode='$zipcode', otherinfo='$otherinfo' WHERE id='$id'";
    // use exec() because no results are returned
    $pdo->exec($sql);
    echo header("Location: http://thelibertycoalition.org/adminlodging.php?edited=1");
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$pdo = null;
?>
