<?php
  session_start();
  if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id_verify'])))//session_variable verification
  {
    $id=$_REQUEST['id_verify'];
?>
<div class='card'>
  <div class='card-content'>
<?php
    if($id==0)  //Sponsors
    {
      //<button onclick='dwnld_all_approved_cat(".$id.")'>Download All Approved</button></br></br></br>
      //<button onclick='dwnld_all_approved_cat_indiv(".$id.")'>Download All I Approved</button></br></br></br>

  		echo
  			"<h5 class='header light'>Approval of Sponsor</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash(".$id.")'>Approve Cash</button>
    			<button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_dd(".$id.")'>Approve DD</button>
    			<button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cheque(".$id.")'>Approve Cheques</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_net(".$id.")'>Approve NET Banking/button>";

    	echo "<div id='select_approve_option'></div>";
    }
    if($id==1)  //Accomodation
    {
      echo
        "<h5 class='header light'>Approval of Accomodation</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash(".$id.")'>Approve Cash</button>";
      echo "<div id='select_approve_option'></div>";
    }
    if($id==2)  //Stall Rents
    {
      echo
        "<h5 class='header light'>Approval of Stall Rents</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash(".$id.")'>Approve Cash</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_dd(".$id.")'>Approve DD</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cheque(".$id.")'>Approve Cheques</button>;
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_net(".$id.")'>Approve NET Banking</button>";
          
      echo "<div id='select_approve_option'></div>";
    }
    if($id==3)  //T-shirt sales
    {
      echo
        "<h5 class='header light'>Approval of T-Shirt Sales</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash(".$id.")'>Approve Cash</button>
          <div id='select_approve_option'></div>";
    }
    if($id==4)  //Workshop
    {
      echo
        "<h5 class='header light'>Approval of Workshop</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash(".$id.")'>Approve Cash</button>
          <div id='select_approve_option'></div>";
    }
    if($id==5)  //Others
    {
      echo
        "<h5 class='header light'>Approval of Others</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash(".$id.")'>Approve Cash</button>
          <button onclick='approve_dd(".$id.")' class='btn waves-effect waves white indigo-text darken-4' >Approve DD</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cheque(".$id.")'>Approve Cheques</button>          
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_net(".$id.")'>Approve NET Banking</button>";

      echo "<div id='select_approve_option'></div>";
    }
    /*if($id==100)  //External
    {
      echo
        "<h5 class='header light'>Approval of Externals</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash(".$id.")'>Approve Cash</button><button onclick='approve_dd(".$id.")'>Approve DD</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cheque(".$id.")'>Approve Cheques</button>";
    }
    if($id==101)  //Internal
    {

    }*/
?>
</div>
</div>
<?php
	}
  else if((isset($_SESSION['name_fin']))&&(!isset($_REQUEST['id_verify']))||((!isset($_SESSION['name_fin']))&&(!isset($_REQUEST['id_verify']))))
  {
    session_unset();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    session_destroy();
    header("Location:login_approve.php");
  }
  else
  {
    session_unset();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    session_destroy();
    echo "<div>Ah4*!bb dhS8!) Nh5@n</div>";
    exit();
  }
?>