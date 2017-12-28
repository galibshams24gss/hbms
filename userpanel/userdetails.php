<?php
include_once('../includes/db.php');
include_once('../includes/hostelroom.php');
include_once('udetails.php');
$userdetail = new Userdetails;
$userdetails = $userdetail->fetch_all();
$hostelroom = new Hostelroom;
$hostelrooms = $hostelroom->fetch_all();
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
					<?php if(isset($error)) { ?>
					<small style="color: red;"><?php echo $error; ?></small>
					<?php } ?>

					<br/><br/>
					<h3><strong>Logged In</strong></h3>
					<?php foreach ($userdetails as $userdetail) { ?>
					Full Name: <strong><?php echo $userdetail['fulllname'];?></strong><br/>
					First Name: <strong><?php echo $userdetail['firstname'];?></strong><br/>
					Last Name: <strong><?php echo $userdetail['lastname'];?></strong><br/>
					Date of Birth: <strong><?php echo $userdetail['dob'];?></strong><br/>
					Nationality: <strong><?php echo $userdetail['nationality'];?></strong><br/>
					Occupation: <strong><?php echo $userdetail['occupation'];?></strong><br/>
					Institute(Educational/Job): <strong><?php echo $userdetail['institute'];?></strong><br/>
					Booked Room: <strong><?php echo $userdetail['hostelroom'];?></strong><br/>
					<?php } ?>
					<a href="index.php" class="btn btn-warning">&larr; LogOut</a>
					<br/>
					<h3><u>Change Room?</u></h3>
					<a href="bookroom.php?id=<?php echo $userdetail['userid'];?>"><small>Change My Room</small></a><br/>
					<?php foreach ($hostelrooms as $hostelroom) { ?>
					<strong> Room ID: <?php echo $hostelroom['room_id'];?></strong><br/>
					Room Type:<?php echo $hostelroom['room_type'];?><br/>
					Room Facilities:<?php echo $hostelroom['room_facilities'];?><br/>
					Room Price:<?php echo $hostelroom['price'];?><br/>
					<?php } ?>
                  </div>
                </div>
              </div>
              </div>
			  <a href="index.php">&larr; Back</a>
    </section>
</body>
</html>