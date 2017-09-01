<?
session_start();
if($_SESSION["loggedin"] == "yes") {

}
else {
  echo header("Location: http://thelibertycoalition.org/");
}
include_once 'includes/connection.php';

$id = $_GET['id'];

try {
    $pdo = new PDO($dsn, $user, $pass, $opt);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM donationdropoff WHERE id='".$id."'";
    // use exec() because no results are returned
    $pdo->exec($sql);
    echo header("Location: http://thelibertycoalition.org/admindistribution.php?deleted=1");
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$pdo = null;
?>
