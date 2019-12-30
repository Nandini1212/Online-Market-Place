
<?php
require_once('dbConnect.php');
?>
<?php
if(isset($_POST)){
	$firstname 		= $_POST['firstname'];
	$lastname 		= $_POST['lastname'];
	$email 			= $_POST['email'];
	$homephone	       = $_POST['homephone'];
	$cellphone 		= $_POST['cellphone']);
		$sql = "INSERT INTO users (firstname, lastname, email, address, homephone, cellphone ) VALUES(?,?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$firstname, $lastname, $email, $address, $homephone, $cellphone]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}