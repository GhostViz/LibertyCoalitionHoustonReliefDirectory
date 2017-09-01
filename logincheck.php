<?
include_once 'includes/connection.php';

$user = $_POST['username'];
$pass = md5($_POST['password']);

$stmt = $pdo->prepare("SELECT password FROM users WHERE username=?");
$stmt->execute([$user]);
$password = $stmt->fetchColumn();
if ($pass == $password) {
    session_start();
    $_SESSION["username"] = $user;
    $_SESSION["password"] = $pass;
    $_SESSION["loggedin"] = "yes";
    echo header("Location: http://thelibertycoalition.org/admin.php");
}
else {
    header("Location: http://thelibertycoalition.org/login.php?error=1");
}
?>
