<script type='text/javascript'>
function submit_pword()
{
	var p1 = document.getElementById("pass1").value;
	var p2 = document.getElementById("pass2").value;
	if(!strcmp(p1,p2)==0||p1==""||p2=="")
	{
		alert("Both Passwords should match!!");
		return false;
	}
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("pass1").value="";
			document.getElementById("pass2").value="";
			document.getElementById("msg").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST","submit_pword.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("p="+p);
}
</script>
<?php
$ResultStr = $_REQUEST["p"];
$email_db=$_REQUEST["e"];
$regno_db=$_REQUEST["r"];
$q = "SELECT * `external_participants` WHERE `regno`='$regno_db',`email`='$email_db',`pword`='$ResultStr'";
$res = mysqli_query($mysqli,$q);
$c = mysqli_num_rows($res);
if($c==1)
{
echo "Please give your password!";
echo "Password: <input type='password' id='pass1' name='pass1'><br/>Re-type Password:<input type='password' id='pass2' name='pass2'>
<br><button type='submit' onclick='submit_pword()'>Submit</button><div id='msg'></div>";
}
else
	echo "Oh Snap!! Something fishy with your verification!";
?>