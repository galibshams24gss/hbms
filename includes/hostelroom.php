<?php
class Hostelroom{
	public function fetch_all(){
		global $pdo;
		$query = $pdo->prepare("SELECT * FROM roomdetails");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function fetch_data($room_id){
		global $pdo;
		$query = $pdo->prepare("SELECT * FROM roomdetails WHERE room_id = ?");
		$query->bindValue(1, $room_id);
		$query->execute();
		return $query->fetch();
	}
}
?>