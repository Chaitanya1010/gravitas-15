<?php
	session_start();
	require 'sql_con.php';
	if(isset($_SESSION['name_fin']))
	{
		$mode=$_SESSION['mode'];
		if($mode==0)
		{
			header('Location:index.php');
		}

		else
		{
			header('Location:approve_home_1.php');
		}
	}
	else if(isset($_POST['admin_login']))
	{
		if(isset($_POST['name'])&&$_POST['pass'])
		{
			$name=$_POST['name'];
			$pass=$_POST['name'];
			$sql_login="SELECT * FROM `admin_login` WHERE name='$name' and pass='$pass';";
			$res_login=mysqli_query($mysqli,$sql_login);
			{
				if(mysqli_num_rows($res_login)>0)
				{
					while($arr=mysqli_fetch_array($res_login))
						$mode=$arr['mode'];

					$_SESSION['name_fin']=$name;
					$_SESSION['mode']=$mode;
					
					if($mode==0)
					{
						header('Location:index.php');
					}

					else
					{
						header('Location:approve_home_1.php');
					}

				}
			}
		}
	}
	else
	{
		echo 
		"<h1> Finance Portal</h1>
		<form action=".$_SERVER["PHP_SELF"]."  method='POST'>
			<input type='text' name='name' id='name' placeholder='Enter your Name'/></br></br>
			<input type='password' name='pass' id='pass' placeholder='Password' /></br></br>
			<input type='submit' class='submit' name='admin_login' onclick='return submit_login()' value='Login' />
		</form>";
	}
?>

<script type="text/javascript">

function submit_login()
{
	var name=document.getElementById('name').value;
	var pass=document.getElementById('pass').value;
	if(name=='' || pass=='')
	{
		alert("Please fill all the details");
		return false;
	}
	return true;
}

</script>