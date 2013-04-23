<?php 

include_once 'functions.php';
session_start();
echo <<<_END
<h3>Sign up Form</h3>
<br /><br />
_END;

$error = $user = $pass = "";
if (isset($_SESSION['user'])) destroySession();

if (isset($_POST['user']))
{
	$user = sanitizeString($_POST['user']);
	$pass = sanitizeString($_POST['pass']);
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$interest = $_POST['interest'];
	$type = $_POST['type'];
	if ($user == "" || $pass == "")//expand this...
	{
		$error = "Not all fields were entered<br /><br />";
	}
	else
	{
		$query = "SELECT * FROM clueUsers WHERE username='$user'";

		if (mysql_num_rows(queryMysql($query)))
		{
			$error = "That username already exists<br /><br />";
		}
		else
		{
			$query = "INSERT INTO clueUsers VALUES('$user','$name', '$pass','$email','$phone','$interest','1','$type')";
			queryMysql($query);
			$query = "CREATE TABLE $user (sl INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,la VARCHAR(20),lo VARCHAR(20),al VARCHAR(20),sp VARCHAR(20),ti VARCHAR(20)) ";
			queryMysql($query);
			$_SESSION['user'] = $user;
			$_SESSION['pass'] = $pass;		
			header("Location:main.php?view=$user");
		}
		
	}
}

if (isset($_FILES['image']['name']))
{
	$saveto = "$user.jpg";
	move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
	$typeok = TRUE;
	
	switch($_FILES['image']['type'])
	{
		case "image/gif":   $src = imagecreatefromgif($saveto); break;

		case "image/jpeg":  // Both regular and progressive jpegs
		case "image/pjpeg":	$src = imagecreatefromjpeg($saveto); break;

		case "image/png":   $src = imagecreatefrompng($saveto); break;

		default:			$typeok = FALSE; break;
	}
	
	if ($typeok)
	{
		list($w, $h) = getimagesize($saveto);
		$max = 100;
		$tw  = $w;
		$th  = $h;
		
		if ($w > $h && $max < $w)
		{
			$th = $max / $w * $h;
			$tw = $max;
		}
		elseif ($h > $w && $max < $h)
		{
			$tw = $max / $h * $w;
			$th = $max;
		}
		elseif ($max < $w)
		{
			$tw = $th = $max;
		}
		
		$tmp = imagecreatetruecolor($tw, $th);
		imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
		imageconvolution($tmp, array( // Sharpen image
							    array(-1, -1, -1),
							    array(-1, 16, -1),
							    array(-1, -1, -1)
						       ), 8, 0);
		imagejpeg($tmp, $saveto);
		imagedestroy($tmp);
		imagedestroy($src);
	}
}

echo <<<_END
<form method='post' action='register.php'>$error
<table style="margin-left:35%;text-align:left">
	<tr><td>Name</td><td><input type='text' name='name'/></td></tr>
	<tr><td>Username</td><td><input type='text' maxlength='16' name='user' value='$user' onBlur='checkUser(this)'/><span id='note'></span></td></tr>
	<tr><td>Password</td><td><input type='password' maxlength='16' name='pass' value='$pass' /></td></tr>
	<tr><td>Email</td><td><input type='text' name='email'/></td></tr>
	<tr><td>Phone No</td><td><input type='text' name='phone'/></td></tr> 
	<tr><td>Interests</td><td><input type='text' name='interest'/></td></tr>
	<tr><td>Image</td><td><input type='file' name='image' size='14' maxlength='32' /></td></tr>
	<tr><td>Use the device as</td><td>private <input type='radio' name='type' value='0'/> public <input type='radio' name='type' value='1'/></td></tr> 
	<tr><td></td><td style="float:right"><input class='ml-button-1' type='submit' value='Signup' /></td></tr>
</table>
</form>
_END;
?>