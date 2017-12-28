<?php
session_start();
include_once('includes/db.php');
include_once('includes/hostelroom.php');
$hostelroom = new Hostelroom;

if(isset($_SESSION['logged_in'])) {
 if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $hostelroom->fetch_data($id);

    if(isset($_POST['roomtype'],$_POST['facilities'],$_POST['price'])) {
    $roomtype = $_POST['roomtype'];
    $facilities = $_POST['facilities'];
	$price = $_POST['price'];

        $sql = "UPDATE roomdetails SET room_type = :roomtype, room_facilities = :facilities, price = :price, roompost_timestamp = :timestamp WHERE room_id = :id";
        $query = $pdo->prepare($sql);

        $query->bindValue(":roomtype", $roomtype);
        $query->bindValue(":facilities", $facilities);
		$query->bindValue(":price", $price);
        $query->bindValue(":timestamp", time());
        $query->bindValue(":id", $id);

        try {
          $result = $query->execute();
        } catch(PDOException $e) {
          echo $e->getCode() . " - " . $e->getMessage();
        }

        if($result) {
          header("Location: index.php");;
        }
    }
 }
}
?>