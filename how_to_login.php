<?php
	include_once 'session.inc.php';
	include_once 'check_login.php';
	include_once 'connect.inc.php';

	if( (!empty($_POST['usn']) || !empty($_POST['email'])) && !empty($_POST['password']) &&!empty($_POST['category']))
	{
		if($_POST['category']=="student")
			$usn=strtoupper(mysqli_real_escape_string($dbconn, $_POST['usn']));
		else
			$email=(mysqli_real_escape_string($dbconn, $_POST['email']));
		$category=(mysqli_real_escape_string($dbconn, $_POST['category']));
		$password=sha1($_POST['password']);
		if($category=="student")
		{
			$query1=mysqli_query($dbconn, "SELECT * FROM users WHERE usn='$usn' and password='$password' and activated=1") or die("Cannot execute query1");
			if(mysqli_num_rows($query1)==1)
			{
				$_SESSION['student_login']=$usn;
				$_SESSION['category']=$_POST['category'];
				echo json_encode(array("success" => true, "message" => 'Valid Details entered', "url" => 'portals/student/index.php#/'));
				return ;
			}
			else
			{
				echo json_encode(array("success" => false, "message" => 'Invalid username or password'));
				return ;
			}
		}
		else if($category=="teacher")
		{
			$query2=mysqli_query($dbconn, "SELECT * FROM staff WHERE email='$email' and password='$password' and activated=1") or die("Cannot execute query2");
			if(mysqli_num_rows($query2)==1)
			{
				$_SESSION['teacher_login']=$email;
				$_SESSION['category']=$_POST['category'];
				echo json_encode(array("success" => true, "message" => 'Valid Details entered', "url" => 'portals/teacher/'));
				return;
			}
			else
			{
				echo json_encode(array("success" => false, "message" => 'Invalid username or password'));
				return;
			}
		}
		else if($category=="HOD")
		{
			$query2=mysqli_query($dbconn, "SELECT * FROM hod WHERE email='$email' and password='$password' and activated=1") or die("Cannot execute query2");
			if(mysqli_num_rows($query2)==1)
			{
				$_SESSION['hod_login']=$email;
				$_SESSION['category']=$_POST['category'];
				$row2=mysqli_fetch_assoc($query2);
				$query3=mysqli_query($dbconn, "SELECT name FROM departments WHERE dept_no={$row2['department']} ") or die("Cant execute query3");
				$row3=mysqli_fetch_assoc($query3);
				$_SESSION['dept_name']=$row3['name'];
				$_SESSION['dept_no']=$row2['department'];
				echo json_encode(array("success" => true, "message" => 'Valid Details Entered', "url" => "portals/HOD/"));
				return;
			}
			else
			{
				$_SESSION['msg1']="<div style=\"color:red\"><b><br>Invalid username or password.</b></div><br><br>";
				echo json_encode(array("success" => false, "message" => 'Invalid username or password'));
				return;
			}
		}
		else
		{
			echo json_encode(array("success" => false, "message" => 'Please fill in all the details'));
			return;
		}
	}
	else{
		echo json_encode(array("success" => false, "message" => 'Please Fill in your details'));
		return;
	}
?>

