<?php
	session_start();
	if(isset($_SESSION['name_fin']))//session_variable
	{
		$mode=$_SESSION['mode'];
    	{
				$head = '';
          	if($mode!=55)
          	{
	            session_unset();
	            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	            header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	            session_destroy();
	            header("Location:login_approve.php");
	        }
	        if($mode==55)
	        {
	          $head = 'Approval For Expenses';
	        }
	    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>GraVITas'15</title>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
<style>
	/* label color */
	.input-field label {
		color: #1a237e;
	}
	/* label focus color */
	.input-field input[type=text]:focus + label {
		color: #303f9f;
	}
	/* label underline focus color */
	.input-field input[type=text] {
		border-bottom: 1px solid #1a237e;
		box-shadow: 0 1px 0 0 #1a237e;
	}
	/* label underline focus color */
	.input-field input[type=text]:focus {
		border-bottom: 1px solid #303f9f;
		box-shadow: 0 1px 0 0 #303f9f;
	}
	label {
		color: #1a237e;
	}
	/* label focus color */
	input[type=text]:focus + label {
		color: #303f9f;
	}
	/* label underline focus color */
	input[type=text] {
		border-bottom: 1px solid #1a237e;
		box-shadow: 0 1px 0 0 #1a237e;
	}
	/* label underline focus color */
	input[type=text]:focus {
		border-bottom: 1px solid #303f9f;
		box-shadow: 0 1px 0 0 #303f9f;
	}
	.input-field input[type=password]:focus + label {
		color: #303f9f;
	}
	/* label underline focus color */
	.input-field input[type=password] {
		border-bottom: 1px solid #1a237e;
		box-shadow: 0 1px 0 0 #1a237e;
	}
	/* label underline focus color */
	.input-field input[type=password]:focus {
		border-bottom: 1px solid #303f9f;
		box-shadow: 0 1px 0 0 #303f9f;
	}
	.input-field textarea:focus + label {
		color: #303f9f;
	}
	/* label underline focus color */
	.input-field textarea {
		border-bottom: 1px solid #1a237e;
		box-shadow: 0 1px 0 0 #1a237e;
	}
	/* label underline focus color */
	 textarea:focus {
		border-bottom: 1px solid #303f9f;
		box-shadow: 0 1px 0 0 #303f9f;
	}
	body {
	display: flex;
	min-height: 100vh;
	flex-direction: column;
}

main {
	flex: 1 0 auto;
}
</style>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>

</head>
<body>
<main>
<header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
	<img src="../gravitaslogo.png" alt class="responsive-img" width="350px">
	<h4 class="header light white-text"><?php echo $head; ?></h4>
	<a class="indigo darken-1 btn waves-effect z-depth-3 right"   title="Logout" href="logout.php">
		<i class="material-icons">power_settings_new</i>
	</a>
	<br />
</header>
<div class="row indigo darken-2" style="width:100%;padding-bottom:0.2em">
<div class="col s12">
	<ul class="tabs indigo darken-2">
		<li class="tab col s2"><a href="#mod" class="white-text waves-effect">Modes</a></li>
	</ul>
</div>
</div>
<div class='container'>

        <h5 class='header light'>Approving Expenses</h5>
		<div class='row'>
			<div class='input-field col s8 m5'>
		        <select id='branch_revenue' class='browser-default' onchange='notify_me_exp(this.value)' name='branch_expenses'>
		          <option value='0'>Choose Branch</option>
		          <option value='11'>Advertisements</option>
		          <option value='12'>Marketing and Publicity</option>
		          <option value='13'>Printing</option>
		          <option value='14'>Stationaries</option>
		          <option value='15'>Photos and Videos</option>
		          <option value='16'>Prize Money</option>
		          <option value='17'>Stall Installation</option>
		          <option value='18'>T-Shirt Purchases</option>
		          <option value='19'>Travel</option>
		          <option value='20'>Workshop</option>
		          <option value='21'>Reimburesement to Merit Students</option>
		          <option value='22'>Miscellaneous</option>
		        </select>
			</div>
		</div>

        <div id='more_credit_options_verify_exp'></div><br>
</div>
</main>
<footer class="page-footer indigo darken-4">
  <div class="footer-copyright">
    <div class="container">
      © COPYRIGHT GRAVITAS 2015
      <a class='modal-trigger right white-text' href='#credits'>Meet the developers</a>
    </div>
  </div>
</footer>
<div id="credits" class="modal">
  <div class="modal-content" style='padding:0'>
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-image">
            <img src="credits.jpg">
            <span class="card-title">Developers</span>
          </div>
          <div class="card-content" style='padding:0'>
            <div class='row'>
              <div class='col s6'>
              <h5 class='header light'><a href="https://in.linkedin.com/pub/chaitanya-tetali/86/763/aa2" target='_blank'>Tetali Chaitanya</a></h5>
                tetali.chaitanya@gmail.com
              </div>
              <div class='col s6'>
                <h5 class='header light'><a href="https://www.linkedin.com/in/rajalakshmisenthil" target='_blank'>Rajalakshmi Senthil</a></h5>
                shambhavi110@gmail.com
              </div>
              <div class='col s6'>
                <h5 class='header light'><a href="https://in.linkedin.com/in/shubhodeep9" target='_blank'>Shubhodeep Mukherjee</a></h5>
               shubhodeep9@gmail.com

              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php
	}
	else//logout
	{
      session_unset();
      header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
      header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
      session_destroy();
      header("Location:login_approve.php");
	}
?>
<script type="text/javascript">

function notify_me_exp(id)  //approve_expenses.php -> exp_cat_category.php
{
	if(id==0)
	{
		alert("Please select an option");
    	document.getElementById("more_credit_options_verify_exp").innerHTML="Please select a valid option";
        return false;
    }
  	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("more_credit_options_verify_exp").innerHTML=xmlhttp.responseText;
          var res=document.getElementById("more_credit_options_verify_exp").innerHTML;
          if(res.indexOf("dhS8!")>0)
          {
            window.location = 'login_approve.php';
          }
		  }
  	}
    xmlhttp.open("GET","exp_cat_category.php?id="+id,true);
    xmlhttp.send();
}


//cash approval starts
function approve_cash_exp(id) //exp_cat_category.php -> approve_cash_exp.php
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      	  document.getElementById("select_approve_option_exp").innerHTML=xmlhttp.responseText;
          var res=document.getElementById("select_approve_option_exp").innerHTML;
	          if(res.indexOf("dhS8!")>0)
	          {
	            window.location = 'login_approve.php';
	          }
		}
  	}
    xmlhttp.open("GET","approve_cash_exp.php?id="+id,true);
    xmlhttp.send();
}

function search_spon_exp(id,cat)  //approve_cash.php->search_name_spon.php
{
	var s = document.getElementById("search_per_name").value;

    if(s!='')
    {
    	var xmlhttp=new XMLHttpRequest();
      	xmlhttp.onreadystatechange=function()
    	{
      	if (xmlhttp.readyState==4 && xmlhttp.status==200)
      	{
        	document.getElementById("search_results_spon_exp").innerHTML=xmlhttp.responseText;
            var res=document.getElementById("search_results_spon_exp").innerHTML;
            if(res.indexOf("dhS8!")>0)
            {
              window.location = 'login_approve.php';
            }
  		  }
    	}
      xmlhttp.open("GET","search_name_spon_exp.php?name="+s+"&id="+id+"&cat="+cat,true);
      xmlhttp.send();
    }
    else
    {
      document.getElementById("search_results_spon_exp").innerHTML="Search results are displayed here";
    }
}

function approve_spon_cash_exp(id_but)  //search_name_spon/approve_cash -> approve_spon_payement
{
    var s=confirm("Do you want to approve the transaction?");
    if(s)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("button_spon_exp_"+id_but).innerHTML=xmlhttp.responseText;
                var res=document.getElementById("button_spon_exp_"+id_but).innerHTML;
                if(res.indexOf("dhS8!")>0)
                {
                  window.location = 'login_approve.php';
                }
            }
        }
        xmlhttp.open("GET","approve_spon_payement_exp.php?id="+id_but,true);
        xmlhttp.send();
        return true;
    }
    return false;
}

function download_cash_exp_excel(id,cat)
{
  var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
          window.location = 'excel_cash_dwn_exp.php?id='+id+'&cat='+cat;
      }
    }
    xmlhttp.open("GET","excel_cash_dwn_exp.php?id="+id+"&cat="+cat,true);
    xmlhttp.send();
}
//Cash approval ends


//DD approval starts

function approve_dd_exp(id)
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("select_approve_option_exp").innerHTML=xmlhttp.responseText;
	        var res=document.getElementById("select_approve_option_exp").innerHTML;
	        if(res.indexOf("dhS8!")>0)
	        {
	            window.location = 'login_approve.php';
	        }
		  }
  	}
  xmlhttp.open("GET","approve_dd_exp.php?id="+id,true);
  xmlhttp.send();

}

function search_spon_dd_exp(cat)//approve_dd -> search_name_spon_dd.php
{
   var s = document.getElementById("search_dd_numb").value
    if(s!='')
    {
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function()
      {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("search_results_spon_dd_exp").innerHTML=xmlhttp.responseText;
            var res=document.getElementById("search_results_spon_dd_exp").innerHTML;
            if(res.indexOf("dhS8!")>0)
            {
              window.location = 'login_approve.php';
            }
        }
      }

      xmlhttp.open("GET","search_name_spon_dd_exp.php?name="+s+"&cat="+cat,true);
      xmlhttp.send();
    }
    else
    {
      document.getElementById("search_results_spon_dd_exp").innerHTML="Search results are displayed here";
    }
}

function approve_spon_dd_exp(id_but)
{
	var s=confirm("Do you want to approve the transaction?");
    if(s)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("button_spon_dd_exp_"+id_but).innerHTML=xmlhttp.responseText;
                var res=document.getElementById("button_spon_dd_exp_"+id_but).innerHTML;
                if(res.indexOf("dhS8!")>0)
                {
                  window.location = 'login_approve.php';
                }
            }
        }
        xmlhttp.open("GET","approve_spon_dd_payement_exp.php?id="+id_but,true);
        xmlhttp.send();
        return true;
    }
    return false;
}

function download_dd_excel_exp(id,cat)
{
  var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
          window.location = 'excel_dd_dwn_exp.php?id='+id+'&cat='+cat;
      }
    }
    xmlhttp.open("GET","excel_dd_dwn_exp.php?id="+id+"&cat="+cat,true);
    xmlhttp.send();
}

//DD approval ends


//Cheque approval starts
function approve_cheque_exp(id)
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("select_approve_option_exp").innerHTML=xmlhttp.responseText;
          	var res=document.getElementById("select_approve_option_exp").innerHTML;
	        if(res.indexOf("dhS8!")>0)
	        {
	            window.location = 'login_approve.php';
	        }
		}
  	}
  	xmlhttp.open("GET","approve_cheque_exp.php?id="+id,true);
  	xmlhttp.send();
}

function search_spon_chq_exp(cat)// approve_cheque.php , search_name_spon_chq.php
{
    var s = document.getElementById("search_chq_numb").value
    if(s!='')
    {
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function()
      {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("search_results_spon_chq_exp").innerHTML=xmlhttp.responseText;
            var res=document.getElementById("search_results_spon_chq_exp").innerHTML;
            if(res.indexOf("dhS8!")>0)
            {
              window.location = 'login_approve.php';
            }
        }
      }

      xmlhttp.open("GET","search_name_spon_chq_exp.php?name="+s+"&cat="+cat,true);
      xmlhttp.send();
    }
    else
    {
      document.getElementById("search_results_spon_chq_exp").innerHTML="Search results are displayed here";
    }
}

function approve_spon_chq_exp(id_but) //approve_cheque -> approve_spon_chq_payement.php
{
    var s=confirm("Do you want to approve the transaction?");
    if(s)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("button_spon_chq_exp_"+id_but).innerHTML=xmlhttp.responseText;
                var res=document.getElementById("button_spon_chq_exp_"+id_but).innerHTML;
                if(res.indexOf("dhS8!")>0)
                {
                  window.location = 'login_approve.php';
                }
            }
        }
        xmlhttp.open("GET","approve_spon_chq_payement_exp.php?id="+id_but,true);
        xmlhttp.send();
        return true;
    }
    return false;
}

function download_chq_excel_exp(id,cat)
{
  var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
          window.location = 'excel_chq_dwn_exp.php?id='+id+'&cat='+cat;
      }
    }
    xmlhttp.open("GET","excel_chq_dwn_exp.php?id="+id+"&cat="+cat,true);
    xmlhttp.send();
}
//Cheque ends here

//Net banking starts
function approve_net_exp(id)
{
	var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
          document.getElementById("select_approve_option_exp").innerHTML=xmlhttp.responseText;
          var res=document.getElementById("select_approve_option_exp").innerHTML;
          if(res.indexOf("dhS8!")>0)
          {
            window.location = 'login_approve.php';
          }
      }
    }
    xmlhttp.open("GET","approve_net_banking_exp.php?id="+id,true);
    xmlhttp.send();
}

//Excel for Net banking

function download_net_excel_exp(id,cat)  
{
    Materialize.toast('Starting Download', 4000, 'rounded');
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            window.location = 'excel_net_dwn_exp.php?id='+id+'&cat='+cat;
        }
    }
    xmlhttp.open("GET","excel_net_dwn_exp.php?id="+id+"&cat="+cat,true);
    xmlhttp.send();
}
//Net banking Ends
</script>
<style>

.modal { max-height: 90%; max-width:90%; }
</style>
<script>
$(document).ready(function(){
// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
$('.modal-trigger').leanModal();
});
</script>