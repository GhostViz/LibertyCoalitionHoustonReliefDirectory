<?
session_start();
if($_SESSION["loggedin"] == "yes") {

}
else {
  echo header("Location: http://thelibertycoalition.org/");
}
include_once 'includes/connection.php';

$id = $_POST['id'];
$weblink = $_POST['weblink'];
$organization = $_POST['organization'];
$contactperson = $_POST['contactperson'];
$phonenumber = $_POST['phonenumber'];
$otherinfo = $_POST['otherinfo'];
try {
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE crowdfunding SET organization='$organization', contactperson='$contactperson', phonenumber='$phonenumber', weblink='$weblink', otherinfo='$otherinfo' WHERE id='$id'";
    // use exec() because no results are returned
    $pdo->exec($sql);
    echo header("Location: http://thelibertycoalition.org/admincrowdfunding.php?edited=1");
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$pdo = null;
?>
