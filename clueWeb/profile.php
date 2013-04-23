<?php 
include_once 'functions.php';
session_start();
if (!isset($_SESSION['user']))
	die("<br /><br />You need to login to view this page");
$user = $_SESSION['user'];

echo "<h3>Edit your Profile</h3>";

if (isset($_POST['name'])||isset($_POST['pass'])||isset($_POST['email'])||isset($_POST['phone'])||isset($_POST['interest'])||isset($_POST['type']))
{
	$name = $_POST['name'];
	$pass = $_POST['pass'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$interest = $_POST['interest'];
	$type = $_POST['type'];
	queryMysql("UPDATE clueUsers SET name='$name' ,password = '$pass' , email = '$email' , phone = '$phone' , interest = '$interest', usertype = '$type' where username='$user'");
	header("Location:main.php?view=$user");
}
else
{
	$query = "SELECT * FROM clueUsers WHERE username='$user'";
	$result = queryMysql($query);
	$row  = mysql_fetch_row($result);
	$name = $row[1];
	$pass = $row[2];
	$email = $row[3];
	$phone= $row[4];
	$interest = $row[5];
	$val = $row[6];//some prob. here with index no
	
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
<form method='post' action='profile.php' enctype='multipart/form-data'>
<table style="margin-left:35%;text-align:left">
	<tr><td>Name</td><td><input type='text' name='name' value='$name'/></td></tr>
	<tr><td>New Password</td><td><input type='password' maxlength='16' name='pass' value='$pass' /></td></tr>
	<tr><td>Email</td><td><input type='text' name='email' value='$email'/></td></tr>
	<tr><td>Phone No</td><td><input type='text' name='phone' value='$phone'/></td></tr> 
	<tr><td>Interests</td><td><input type='text' name='interest' value='$interest'/></td></tr>
	<tr><td>Use the device as</td><td>private <input type='radio' name='type' value='0'
_END;
if(!$val) {
	echo "checked='checked'";
	}
	
	echo "/> public <input type='radio' name='type' value='1'";
if($val) {
	echo "checked='checked'";
	}
echo <<<_END
	/></td></tr> 
	<tr><td>Image</td><td><input type='file' name='image' size='14' maxlength='32' /></td></tr>
	<tr><td></td><td style="float:right"><input class='ml-button-1' type='submit' value='Update Profile'/></td></tr>
</table>
</form>
_END;
?>