<?php

require_once "User.php";

$user = new User($_GET['username'], $_GET['password']);
if (!$user->isValid())
{
	echo json_encode([
		'success' => false,
		'response' => 'User is not valid',
	]);
}
else
{
	$conn = new PDO('mysql:host=localhost;dbname=www', 'root', '');
	
	$sql = "INSERT INTO `users` (username, password)  VALUES(:username, :pass)";
	
	$statement = $conn->prepare($sql);
	if ($statement->execute([
			'username' => $user->getUsername(),
			'pass' => $user->getPassword(),
		]))
	{
		echo json_encode([
			'success' => true,
		]);
	}
	else
	{
		echo json_encode([
			'success' => false,
			'response' => $statement->errorInfo()[2],
		]);
	}	
}
