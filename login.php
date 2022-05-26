<?php

session_start();

include "baglan.php";

if(isset($_POST['uname']) && isset($_POST['password']))
{
	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if(empty($uname))
	{
		header("Location: admin.php?error=username gerekli");
		exit();
	}
	else if (empty($pass))
	{
		header("Location: admin.php?error=sifre gerekli");
		exit();
	}
	else{
		$sql = "SELECT * FROM veri WHERE uname='$uname' AND pass='$pass'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) == 1)
		{
			$row = mysqli_fetch_assoc($result);
			if($row['uname'] === $uname&& $row['pass']=== $pass)
			{
				header("Location: home.php");
				exit();
			}/*else{
				header("Location: admin.php?error=Yanlis Kullanici Adi Veya Sifre");
				exit();
			}*/
		}else
		{
			header("Location: admin.php?error=Yanlis Kullanici Adi Veya Sifre");
			exit();
		}

	}
}else{
	header("Location: admin.php");
	exit();
}
?>