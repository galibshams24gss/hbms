<?php
session_start();
include_once('includes/db.php');
include_once('includes/hostelroom.php');
$hostelroom = new Hostelroom;

if(isset($_SESSION['logged_in'])) {
 if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$data = $hostelroom->fetch_data($id);
	$query = $pdo->prepare("SELECT * FROM roomdetails WHERE room_id = ?");
	$query->bindValue(1, $id);
	$query->execute();
?>

<html>
<head>
<title>YHMS</title>
<link rel="stylesheet" href="styleassets/style.css" />
<script src="/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background: url('images/Colour.jpg') no-repeat; background-size: cover;">
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
              <a href="http://localhost/hms/userpanel/index.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Panel<span class="badge"></span></a>
            </div>
          </div>
          <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h4 class="panel-title"><strong>Edit Room Details</strong></h4>
              </div>
              <div class="panel-body">
                <div class="text-center">
                  <div class="well dash-box">
					<?php if(isset($error)) { ?>
					<small style="color: red;"><?php echo $error; ?></small>
					<?php } ?>
					<br/>
					<form action="updatedroom.php?id=<?php echo $data['room_id'];?>" method="post">
					Room Type: <input type="text" name="roomtype" value="<?php echo $data['room_type'];?>"/><br/><br/>
					Room Facilities: <input type="text" name="facilities" value="<?php echo $data['room_facilities'];?>"/><br/><br/>
					Room Price: <input type="text" name="price" value="<?php echo $data['price'];?>"/><br/><br/>
					<input type="submit" name="btn" value="UPDATE" class="btn btn-warning" onclick="alert('Room Details have been updated')"/>
					</form>
                  </div>
                </div>
              </div>
              </div>
			  <a href="index.php">&larr; Back</a>
</section>
</body>
</html>

<?php
 }
}else{
	header("Location: http://localhost/hms/adminpanel/index.php");
}
?>