<?php
include_once('../includes/db.php');
include_once('../includes/hostelroom.php');
include_once('udetails.php');
$userdetail = new Userdetails;
$hostelroom = new Hostelroom;
$hostelrooms = $hostelroom->fetch_all();

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$data = $userdetail->fetch_data($id);
	$query = $pdo->prepare("SELECT * FROM ud WHERE userid = ?");
	$query->bindValue(1, $id);
	$query->execute();
?>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>YHMS</title>
<link rel="stylesheet" href="../styleassets/style.css" />
<script src="../js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background: url('../images/Colour.jpg') no-repeat; background-size: cover;">

<nav class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://localhost/hms/index.php">YHMS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://localhost/hms/index.php">HOME</a></li>
            <li><a href="http://localhost/hms/adminpanel/">ADMIN PANEL</a></li>
            <li><a href="http://localhost/hms/userpanel/">USER PANEL</a></li>
          </ul>
        </div>
</nav>
<header id="header">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Youth Hostel Management System <small>We Manage Hostel System</small></h1>
          </div>
</header>

<section id="main">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> YHMS
              </a>
              <a href="http://localhost/hms/index.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Home<span class="badge"></span></a>
              <a href="http://localhost/hms/adminpanel/index.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Admin Panel<span class="badge"></span></a>
            </div>
          </div>
          <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <div class="well dash-box">
					<h4><strong>Type Your Preferred Room Type</strong></h4>
					<form action="bookedroom.php?id=<?php echo $data['userid'];?>" method="post">
					<input type="text" name="type" value="<?php echo $data['hostelroom'];?>"/><br/><br/>
					<input type="submit" name="btn" class="btn btn-warning" value="CHANGE" onclick="alert('Your Room has been changed!')"/>
					</form>
                  </div>
                </div>
              </div>
              </div>
			  <a href="http://localhost/hms/userpanel/userdetails.php">&larr; Back</a>
    </section>
</body>
</html>
<?php
 }
?>