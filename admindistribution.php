<?
session_start();
if($_SESSION["loggedin"] == "yes") {

}
else {
  echo header("Location: http://thelibertycoalition.org/");
}
include_once 'includes/connection.php';

$added = $_GET['added'];
$deleted = $_GET['deleted'];
$edited = $_GET['edited'];
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Houston Harvey Aid Database Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
      body {
        padding-top: 54px;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }

    </style>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">HHAD Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="admin.php">Relief Agencies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminlodging.php">Lodging</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admincrowdfunding.php">Crowdfunding</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="admindistribution.php">Distribution Centers</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <? if($added==1) { echo '<div class="alert alert-success col-sm-12"><p>Distribution Center Added</p></div>';}?>
          <? if($deleted==1) { echo '<div class="alert alert-danger col-sm-12"><p">Distribution Center Deleted</p></div>';}?>
          <? if($edited==1) { echo '<div class="alert alert-success col-sm-12"><p">Distribution Center Edited</p></div>';}?>

          <h3 class="mt-5">Add Distribution Centers</h3>
          <br />
          <form method="post" action="adddistribution.php">
            <table class="table col-lg-8">
            <tr><td><label>Organization</label></td><td><input type="text" name="organization"></td></tr>
            <tr><td><label>Address</label></td><td><input type="text" name="address"></td></tr>
            <tr><td><label>City</label></td><td><input type="text" name="city"></td></tr>
            <tr><td><label>State</label></td><td><input type="text" name="state"></td></tr>
            <tr><td><label>Zipcode</label></td><td><input type="text" name="zipcode"></td></tr>
            <tr><td><label>Contact Person</label></td><td><input type="text" name="contactperson"></td></tr>
            <tr><td><label>Phone Number</label></td><td><input type="text" name="phonenumber"></td></tr>
            <tr><td><label>Items Available</label></td><td><input type="text" name="items"></td></tr>
            <tr><td><label>Items Needed</label></td><td><input type="text" name="itemsneeded"></td></tr>
            <tr><td><label>Other Info</label></td><td><input type="textbox" name="otherinfo"></td></tr>
            <tr><td></td><td><button class="btn" type="submit">Submit</button></td></tr>
          </table>
          </form>
        </div>
      </div>
    </div>


    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h3 class="mt-5">Distribution Centers</h3>
          <br />
          <?
            $stmt = $pdo->query('SELECT * FROM donationdropoff ORDER BY organization ASC');
            while ($row = $stmt->fetch())
            {
                echo "<div class=\"card\">
                        <div class=\"card-body\">
                          <h4 class=\"card-title\">"
                            . $row['organization'] .
                          "</h4>
                          <h6 class=\"card-subtitle mb-2 text-muted\">"
                          . $row['address'] . " " . $row['city'] . ", " . $row['state'] . " " . $row['zipcode'] .
                          "</h6>
                          <p  class=\"card-text\">" . $row['contactperson'] . " " . $row['phonenumber'] . "</p>
                          <p class=\"card-text\"><strong>Items Available: </strong>" . $row['items'] . "</p>
                          <p class=\"card-text\"><strong>Items Needed: </strong>" . $row['itemsneeded'] . "</p>
                          <p class=\"card-text\"><strong>Other Info: </strong>" . $row['otherinfo'] ." </p>
                          <a href=\"editdistribution.php?id=" . $row['id'] . "\" class=\"btn btn-warning\">Edit</a><a href=\"deletedistribution.php?id=" . $row['id'] . "\" class=\"btn btn-danger\">Delete</a>
                        </div>
                      </div>";
            }
          ?>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
