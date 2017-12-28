<?php
include_once('../includes/db.php');
include_once('../includes/hostelroom.php');
$hostelroom = new Hostelroom;
$hostelrooms = $hostelroom->fetch_all();

if(isset($_POST['fulllname'],$_POST['firstname'],$_POST['lastname'],$_POST['dob'],$_POST['nationality'],$_POST['occupation'],$_POST['institute'],$_POST['hostelroom'])){
		$fulllname = $_POST['fulllname'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$dob = $_POST['dob'];
		$nationality = $_POST['nationality'];
		$occupation = $_POST['occupation'];
		$institute = $_POST['institute'];
		$hostelroom = $_POST['hostelroom'];
		
		if(empty($fulllname) or empty($firstname) or empty($lastname) or empty($dob) or empty($nationality) or empty($occupation) or empty($institute) or empty($hostelroom)){
			$error = 'Required to Add!';
		}else{
			$query = $pdo->prepare('INSERT INTO ud (fulllname, firstname, lastname, dob, nationality, occupation, institute, hostelroom) VALUES (?,?,?,?,?,?,?,?)');
			$query->bindValue(1,$fulllname);
			$query->bindValue(2,$firstname);
			$query->bindValue(3,$lastname);
			$query->bindValue(4,$dob);
			$query->bindValue(5,$nationality);
			$query->bindValue(6,$occupation);
			$query->bindValue(7,$institute);
			$query->bindValue(8,$hostelroom);
			
			$query->execute();
			header('Location: index.php');
		}
	}
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
					<h3><strong>Add Details</strong></h3>
					<form action="newusers.php" method="post" autocomplete="off" >
					Full Name: <input type="text" name="fulllname" placeholder="Fullname"/><br/>
					First Name: <input type="text" name="firstname" placeholder="Firstname"/><br/>
					Last Name: <input type="text" name="lastname" placeholder="Lastname"/><br/>
					Date of Birth: <input type="text" name="dob" placeholder="Date of Birth"/><br/>
					Nationality: <input type="text" name="nationality" placeholder="Nationality"/><br/>
					Occupation: <input type="text" name="occupation" placeholder="Occupation"/><br/>
					Institute(Educational/Job): <input type="text" name="institute" placeholder="Institute"/><br/>
					I want to choose Room: <input type="text" name="hostelroom" placeholder="Hostelroom"/><br/>
					<input type="submit" value="SUBMIT" class="btn btn-success"/><br/>
					</form>
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