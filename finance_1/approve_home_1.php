<?php
	session_start();
	if(isset($_SESSION['name_fin']))//session_variable
	{
		  $mode=$_SESSION['mode'];
    	{
          if($mode==0)
          {
            session_unset();
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
            session_destroy();
            header("Location:login_approve.php");
          }
	        if($mode==1)
	        {
	          echo "<h1>1st Approval</h1>";
	        }

	        if($mode==2)
	        {
	          echo "<h1>2nd Approval</h1>";
	        }
	        
	        if($mode==3)
	        {
	          echo "<h1>3rd Approval</h1>";
	        }
	   }

		echo "
		<a href='logout.php' title='Logout'>Log-out</a></br></br>
    	
      Registration:</br>
        <input type = 'radio' value ='external' name ='mode_registration' id='100' onclick='registrations_verify(this.id)'>External Registration<br>
        <input type = 'radio' value ='internal' name ='mode_registration' id='101' onclick='registrations_verify(this.id)'>Internal Registration<br>
        	
         </br></br></br> 


			Modes:</br>
				<input type = 'radio' value ='sponsor' name ='mode_verify' id='0' onclick='verify_method_pay(this.id)'>Sponsor<br>
				<input type = 'radio' value ='accomodation' name ='mode_verify' id='1' onclick='verify_method_pay(this.id)'>Accomodation<br>
				<input type = 'radio' value ='stall_rent' name ='mode_verify' id='2' onclick='verify_method_pay(this.id)'>Stall Rent<br>
				<input type = 'radio' value ='shirt_sales' name ='mode_verify' id='3' onclick='verify_method_pay(this.id)'>T Shirt Sales<br>
				<input type = 'radio' value ='workshop' name ='mode_verify' id='4' onclick='verify_method_pay(this.id)'>Workshops<br>
				<input type = 'radio' value ='others' name ='mode_verify' id='5' onclick='verify_method_pay(this.id)'>Others<br>
				</br>

        <h3>Excel Downloads for Expenses</h3>

        Branch:
        <select id='branch_revenue' onchange='notify_me_exel_dwnd(this.value)' name='branch_expenses'>
          <option value='0'>Choose Any One</option>  
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
        </select></br></br>

        <div id='more_credit_options_verify'></div><br>";
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
//display the more options for mode of payement
function verify_method_pay(id)  //approve_home_1.php -> approve_1.php
{
  	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("more_credit_options_verify").innerHTML=xmlhttp.responseText;
          var res=document.getElementById("more_credit_options_verify").innerHTML;
          if(res.indexOf("dhS8!")>0)
          {
            window.location = 'login_approve.php';
          }
		  }
  	}
  xmlhttp.open("GET","approve_1.php?id_verify="+id,true);
  xmlhttp.send();
}

function registrations_verify(id)
{
  var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
          document.getElementById("more_credit_options_verify").innerHTML=xmlhttp.responseText;
          var res=document.getElementById("more_credit_options_verify").innerHTML;
          if(res.indexOf("dhS8!")>0)
          {
            window.location = 'login_approve.php';
          }
      }
    }
  xmlhttp.open("GET","reg_approve_1.php?id="+id,true);
  xmlhttp.send();
}

/*Approve cash starts*/

function approve_cash(id) //approve_1.php -> approve_cash.php
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("select_approve_option").innerHTML=xmlhttp.responseText;
          var res=document.getElementById("select_approve_option").innerHTML;
          if(res.indexOf("dhS8!")>0)
          {
            window.location = 'login_approve.php';
          }
		  }
  	}
    xmlhttp.open("GET","approve_cash.php?id="+id,true);
    xmlhttp.send();
}

function search_spon(id,cat)  //approve_cash.php->search_name_spon.php
{
    if(id==1)
    {
      	var s = document.getElementById("search_per_name").value;
        if(s!='')
        {
          document.getElementById("search_comp_name").value='';
        }
    }
    if(id==2)
    {
        var s = document.getElementById("search_comp_name").value;
        if(s!='')
        {
          document.getElementById("search_per_name").value='';
        }
    }
    if(s!='')
    {
    	var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function()
    	{
      	if (xmlhttp.readyState==4 && xmlhttp.status==200)
      	{
        		document.getElementById("search_results_spon").innerHTML=xmlhttp.responseText;
            var res=document.getElementById("search_results_spon").innerHTML;
            if(res.indexOf("dhS8!")>0)
            {
              window.location = 'login_approve.php';
            }
  		  }
    	}
      xmlhttp.open("GET","search_name_spon.php?name="+s+"&id="+id+"&cat="+cat,true);
      xmlhttp.send();
    }
    else
    {
      document.getElementById("search_results_spon").innerHTML="Search results are displayed here";
    }
}

function approve_spon_cash(id_but)  //search_name_spon/approve_cash -> approve_spon_payement
{
    var s=confirm("Do you want to approve the transaction?");
    if(s)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("button_spon_"+id_but).innerHTML=xmlhttp.responseText;
                var res=document.getElementById("button_spon_"+id_but).innerHTML;
                if(res.indexOf("dhS8!")>0)
                {
                  window.location = 'login_approve.php';
                }
            }
        }
        xmlhttp.open("GET","approve_spon_payement.php?id="+id_but,true);
        xmlhttp.send();
        return true;
    }
    return false;
}
/*Approve cash ends*/


/*DD starts from here*/
function approve_dd(id) //approve_1.php -> approve_dd.php
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("select_approve_option").innerHTML=xmlhttp.responseText;
          var res=document.getElementById("select_approve_option").innerHTML;
          if(res.indexOf("dhS8!")>0)
          {
            window.location = 'login_approve.php';
          }
		  }
  	}
  xmlhttp.open("GET","approve_dd.php?id="+id,true);
  xmlhttp.send();
}

function search_spon_dd(id,cat)//approve_dd -> search_name_spon_dd.php
{
   var s = document.getElementById("search_dd_numb").value
    if(s!='')
    {
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function()
      {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("search_results_spon_dd").innerHTML=xmlhttp.responseText;
            var res=document.getElementById("search_results_spon_dd").innerHTML;
            if(res.indexOf("dhS8!")>0)
            {
              window.location = 'login_approve.php';
            }
        }
      }

      xmlhttp.open("GET","search_name_spon_dd.php?name="+s+"&cat="+cat,true); 
      xmlhttp.send();
    }
    else
    {
      document.getElementById("search_results_spon_dd").innerHTML="Search results are displayed here";
    } 
}

function approve_spon_dd(id_but) //search_name_spon_dd.php/  approve_dd.php -> approve_spon_dd_payement.php
{
    var s=confirm("Do you want to approve the transaction?");
    if(s)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("button_spon_dd_"+id_but).innerHTML=xmlhttp.responseText;
                var res=document.getElementById("button_spon_dd_"+id_but).innerHTML;
                if(res.indexOf("dhS8!")>0)
                {
                  window.location = 'login_approve.php';
                }
            }
        }
        xmlhttp.open("GET","approve_spon_dd_payement.php?id="+id_but,true);
        xmlhttp.send();
        return true;
    }
    return false;
}
/*Approve DD ends*/


/*Approve Cheque starts*/
function approve_cheque(id) //approve_1.php -> approve_cheque.php
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("select_approve_option").innerHTML=xmlhttp.responseText;
          var res=document.getElementById("select_approve_option").innerHTML;
          if(res.indexOf("dhS8!")>0)
          {
            window.location = 'login_approve.php';
          }
		  }
  	}
  xmlhttp.open("GET","approve_cheque.php?id="+id,true);
  xmlhttp.send();
}



function search_spon_chq(id,cat)// approve_cheque.php , search_name_spon_chq.php
{
    var s = document.getElementById("search_chq_numb").value
    if(s!='')
    {
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.onreadystatechange=function()
      {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("search_results_spon_chq").innerHTML=xmlhttp.responseText;
            var res=document.getElementById("search_results_spon_chq").innerHTML;
            if(res.indexOf("dhS8!")>0)
            {
              window.location = 'login_approve.php';
            }
        }
      }

      xmlhttp.open("GET","search_name_spon_chq.php?name="+s+"&cat="+cat,true); 
      xmlhttp.send();
    }
    else
    {
      document.getElementById("search_results_spon_chq").innerHTML="Search results are displayed here";
    } 
}

function approve_spon_chq(id_but) //approve_cheque -> approve_spon_chq_payement.php
{
    var s=confirm("Do you want to approve the transaction?");
    if(s)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("button_spon_chq_"+id_but).innerHTML=xmlhttp.responseText;
                var res=document.getElementById("button_spon_chq_"+id_but).innerHTML;
                if(res.indexOf("dhS8!")>0)
                {
                  window.location = 'login_approve.php';
                }
            }
        }
        xmlhttp.open("GET","approve_spon_chq_payement.php?id="+id_but,true);
        xmlhttp.send();
        return true;
    }
    return false;
}

/*Approve cheque Ends*/


/*EXCEL downloads*/
function download_cash_excel(id,cat)	//Make it as event-wise //approve_cash.php -> excel_cash_dwn.php
{
	//var s = document.getElementById("min").value;
	//var e = document.getElementById("max").value;
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_cash_dwn.php?id='+id+'&cat='+cat;
    	}
  	}
  	xmlhttp.open("GET","excel_cash_dwn.php?id="+id+"&cat="+cat,true);
    xmlhttp.send();
}

function notify_me_exel_dwnd(id)  //approve_1.php -> excel_cat_category.php
{
  var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
          window.location.replace("excel_cat_category.php?id="+id);
      }
    }
    xmlhttp.open("GET","excel_cat_category.php?id="+id,true);
    xmlhttp.send();
}

function download_chq_excel(id,cat) //approve_cheque -> excel_cqh_dwn.php
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_cqh_dwn.php?id='+id+'&cat='+cat;
    	}
  	}
  	xmlhttp.open("GET","excel_cqh_dwn.php?id="+id+"&cat="+cat,true);
    xmlhttp.send();
}

function download_dd_excel(id,cat)  //approve_dd.php -> excel_dd_dwn.php
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_dd_dwn.php?id='+id+'&cat='+cat;
    	}
  	}
  	xmlhttp.open("GET","excel_dd_dwn.php?id="+id+"&cat="+cat,true);
    xmlhttp.send();
}

function dwnld_all_approved_cat(id) //approve_1.php -> excel_approved_category_dwnld.php
{
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
          window.location = 'excel_approved_category_dwnld.php?id='+id;
      }
    }
    xmlhttp.open("GET","excel_approved_category_dwnld.php?id="+id,true);
    xmlhttp.send();
}

function dwnld_all_approved_cat_indiv(id)
{
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
          window.location = 'excel_approved_category_dwnld_indiv.php?id='+id;
      }
    }
    xmlhttp.open("GET","excel_approved_category_dwnld_indiv.php?id="+id,true);
    xmlhttp.send();
}

</script>
				
				