<?php
  session_start();
  if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id_verify'])))//session_variable verification
  {
    $id=$_REQUEST['id_verify'];

    if($id==0)  //Sponsors
    {
      //<button onclick='dwnld_all_approved_cat(".$id.")'>Download All Approved</button></br></br></br>
      //<button onclick='dwnld_all_approved_cat_indiv(".$id.")'>Download All I Approved</button></br></br></br>
          
  		echo
  			"<h2>Approval of Sponsor</h2>
          <button onclick='approve_cash(".$id.")'>Approve Cash</button></br></br>
    			<button onclick='approve_dd(".$id.")'>Approve DD</button></br></br>
    			<button onclick='approve_cheque(".$id.")'>Approve Cheques</button></br></br></br>";

    	echo "<div id='select_approve_option'></div>";
    }
    if($id==1)  //Accomodation
    {
      echo
        "<h2>Approval of Accomodation</h2>
          <button onclick='approve_cash(".$id.")'>Approve Cash</button></br></br>";
      echo "<div id='select_approve_option'></div>";
    }
    if($id==2)  //Stall Rents
    {
      echo
        "<h2>Approval of Stall Rents</h2>
          <button onclick='approve_cash(".$id.")'>Approve Cash</button></br></br>
          <button onclick='approve_dd(".$id.")'>Approve DD</button></br></br>
          <button onclick='approve_cheque(".$id.")'>Approve Cheques</button></br></br></br>";
      echo "<div id='select_approve_option'></div>";
    }
    if($id==3)  //T-shirt sales
    {
      echo
        "<h2>Approval of T-Shirt Sales</h2>
          <button onclick='approve_cash(".$id.")'>Approve Cash</button></br></br>
          <div id='select_approve_option'></div>";
    }
    if($id==4)  //Workshop
    {
      echo
        "<h2>Approval of Workshop</h2>
          <button onclick='approve_cash(".$id.")'>Approve Cash</button></br></br>
          <div id='select_approve_option'></div>";
    }
    if($id==5)  //Others
    {
      echo
        "<h2>Approval of Others</h2>
          <button onclick='approve_cash(".$id.")'>Approve Cash</button></br>
          </br><button onclick='approve_dd(".$id.")'>Approve DD</button></br></br>
          <button onclick='approve_cheque(".$id.")'>Approve Cheques</button></br></br></br>";
      echo "<div id='select_approve_option'></div>";
    }
    if($id==100)  //External
    {
      echo
        "<h2>Approval of Externals</h2>
          <button onclick='approve_cash(".$id.")'>Approve Cash</button></br>
          </br><button onclick='approve_dd(".$id.")'>Approve DD</button></br></br>
          <button onclick='approve_cheque(".$id.")'>Approve Cheques</button></br></br></br>";
    }
    if($id==101)  //Internal
    {

    }

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