<?php
	session_start();
	if(isset($_SESSION['name_fin']))//session_variable
	{
    $id=$_REQUEST['id_verify'];

    if($id==0)
    {
  		echo
  			"<h2>Approval of Sponsor</h2>
          <button onclick='dwnld_all_approved_cat(".$id.")'>Download All Approved</button></br></br></br>
          <button onclick='dwnld_all_approved_cat_indiv(".$id.")'>Download All I Approved</button></br></br></br>
          <button onclick='approve_cash(".$id.")'>Approve Cash</button></br></br>
    			<button onclick='approve_dd(".$id.")'>Approve DD</button></br></br>
    			<button onclick='approve_cheque(".$id.")'>Approve Cheques</button></br></br></br>";

    	echo "<div id='select_approve_option'></div>";
    }
    if($id==1)
    {
      echo
        "<h2>Approval of Accomodation</h2>
          <button onclick='approve_cash(".$id.")'>Approve Cash</button></br></br>";
      echo "<div id='select_approve_option'></div>";
    }
    if($id==2)
    {
      echo
        "<h2>Approval of Stall Rents</h2>
          <button onclick='approve_cash(".$id.")'>Approve Cash</button></br></br>
          <button onclick='approve_dd(".$id.")'>Approve DD</button></br></br>
          <button onclick='approve_cheque(".$id.")'>Approve Cheques</button></br></br></br>";
      echo "<div id='select_approve_option'></div>";
    }
    if($id==3)
    {
      echo
        "<h2>Approval of T-Shirt Sales</h2>
          <button onclick='approve_cash(".$id.")'>Approve Cash</button></br></br>
          <div id='select_approve_option'></div>";
    }
    if($id==4)
    {
      echo
        "<h2>Approval of Workshop</h2>
          <button onclick='approve_cash(".$id.")'>Approve Cash</button></br></br>
          <div id='select_approve_option'></div>";
    }
    if($id==5)
    {
      echo
        "<h2>Approval of Others</h2>
          <button onclick='approve_cash(".$id.")'>Approve Cash</button></br>
          </br><button onclick='approve_dd(".$id.")'>Approve DD</button></br></br>
          <button onclick='approve_cheque(".$id.")'>Approve Cheques</button></br></br></br>";
      echo "<div id='select_approve_option'></div>";
    }

	}
  else
  {
      session_unset();
      session_destroy();
      header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
      header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
      header("Location:login_approve.php");
  }
?>
