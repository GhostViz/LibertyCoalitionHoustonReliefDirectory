<?
include_once 'includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Houston Harvey Aid Database</title>

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
        <a class="navbar-brand" href="#">The Liberty Coalition</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="relief.php">Relief Agencies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="lodging.php">Lodging</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="crowdfunding.php">Crowdfunding</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="distribution.php">Distribution Centers</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

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
                          . $row['address'] . " " . $row['city'] . ", " . $row['state'] . " " .$row['zipcode'] .
                          "</h6>
                          <p  class=\"card-text\">" . $row['contactperson'] . " " . $row['phonenumber'] . "</p>
                          <p class=\"card-text\"><strong>Items Available: </strong>" . $row['items'] . "</p>
                          <p class=\"card-text\"><strong>Items Needed: </strong>" . $row['itemsneeded'] . "</p>
                          <p class=\"card-text\"><strong>Other Info: </strong>" . $row['otherinfo'] ." </p>
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
