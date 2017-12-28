<?php
include_once('includes/db.php');
include_once('includes/hostelroom.php');
$hostelroom = new Hostelroom;
$hostelrooms = $hostelroom->fetch_all();

$search=$_POST['search'];
$sql = "SELECT * FROM roomdetails WHERE room_type LIKE '%$search%'";
$srch = $pdo->query($sql);
$count = $srch->rowCount();

if($count > 0)
{
	while($dt = $srch->fetchAll(PDO::FETCH_ASSOC))
	{
		foreach ($dt as $dts){
			?>
			<strong><u><?php echo $dts['room_type']."<br/>";?></strong></u>
			<?php
			echo $dts['room_facilities']."<br/>";
			echo $dts['price']."<br/>";
		}
	}	
}
else{
	echo "Room Type Not Found!";
}
?>