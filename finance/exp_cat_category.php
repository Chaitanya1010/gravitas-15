<?php
  session_start();
  if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
  {
    $id=$_REQUEST['id'];
?>
<div class='card'>
  <div class='card-content'>
<?php
    if($id==11)  //Advertisements
    {
  		echo
  			"<h5 class='header light'>Approval of Advertisements</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash_exp(".$id.")'>Approve Cash</button>
    			<button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_dd_exp(".$id.")'>Approve DD</button>
    			<button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cheque_exp(".$id.")'>Approve Cheques</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_net_exp(".$id.")'>Approve NET Banking</button>";

    	echo "<div id='select_approve_option_exp'></div>";
    }

    if($id==12)  //Marketing and Publicity
    {
      echo
        "<h5 class='header light'>Approval of Marketing and Publicity</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash_exp(".$id.")'>Approve Cash</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_dd_exp(".$id.")'>Approve DD</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cheque_exp(".$id.")'>Approve Cheques</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_net_exp(".$id.")'>Approve NET Banking</button>";

      echo "<div id='select_approve_option_exp'></div>";
    }

    if($id==13)  //Printing
    {
      echo
        "<h5 class='header light'>Approval of Printing</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash_exp(".$id.")'>Approve Cash</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_dd_exp(".$id.")'>Approve DD</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cheque_exp(".$id.")'>Approve Cheques</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_net_exp(".$id.")'>Approve NET Banking</button>";

      echo "<div id='select_approve_option_exp'></div>";
    }

    if($id==14)  //Stationaries
    {
      echo
        "<h5 class='header light'>Approval of Stationaries</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash_exp(".$id.")'>Approve Cash</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_dd_exp(".$id.")'>Approve DD</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cheque_exp(".$id.")'>Approve Cheques</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_net_exp(".$id.")'>Approve NET Banking</button>";

      echo "<div id='select_approve_option_exp'></div>";
    }

    if($id==15)  //Photos and Videos
    {
      echo
        "<h5 class='header light'>Approval of Photos and Videos</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash_exp(".$id.")'>Approve Cash</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_dd_exp(".$id.")'>Approve DD</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cheque_exp(".$id.")'>Approve Cheques</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_net_exp(".$id.")'>Approve NET Banking</button>";

      echo "<div id='select_approve_option_exp'></div>";
    }

    if($id==16)  //Prize Money
    {
      echo
        "<h5 class='header light'>Approval of Prize Money</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash_exp(".$id.")'>Approve Cash</button>";
         /* <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_dd_exp(".$id.")'>Approve DD</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cheque_exp(".$id.")'>Approve Cheques</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_net_exp(".$id.")'>Approve NET Banking</button>";*/

      echo "<div id='select_approve_option_exp'></div>";
    }

    if($id==17)  //Stall Installation
    {
      echo
        "<h5 class='header light'>Approval of Stall Installation</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash_exp(".$id.")'>Approve Cash</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_dd_exp(".$id.")'>Approve DD</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cheque_exp(".$id.")'>Approve Cheques</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_net_exp(".$id.")'>Approve NET Banking</button>";

      echo "<div id='select_approve_option_exp'></div>";
    }

    if($id==18)  //T-Shirt Purchases
    {
      echo
        "<h5 class='header light'>Approval of T-Shirt Purchases</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash_exp(".$id.")'>Approve Cash</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_dd_exp(".$id.")'>Approve DD</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cheque_exp(".$id.")'>Approve Cheques</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_net_exp(".$id.")'>Approve NET Banking</button>";

      echo "<div id='select_approve_option_exp'></div>";
    }

    if($id==19)  //Travel
    {
      echo
        "<h5 class='header light'>Approval of Travel</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash_exp(".$id.")'>Approve Cash</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_dd_exp(".$id.")'>Approve DD</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cheque_exp(".$id.")'>Approve Cheques</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_net_exp(".$id.")'>Approve NET Banking</button>";

      echo "<div id='select_approve_option_exp'></div>";
    }

    if($id==20)  //Workshop
    {
      echo
        "<h5 class='header light'>Approval of Workshop</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash_exp(".$id.")'>Approve Cash</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_dd_exp(".$id.")'>Approve DD</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cheque_exp(".$id.")'>Approve Cheques</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_net_exp(".$id.")'>Approve NET Banking</button>";

      echo "<div id='select_approve_option_exp'></div>";
    }

    if($id==21)  //Reimburesement to Merit Students
    {
      echo
        "<h5 class='header light'>Approval of Reimburesement to Merit Students</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash_exp(".$id.")'>Approve Cash</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_dd_exp(".$id.")'>Approve DD</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cheque_exp(".$id.")'>Approve Cheques</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_net_exp(".$id.")'>Approve NET Banking</button>";

      echo "<div id='select_approve_option_exp'></div>";
    }

    if($id==22)  //Miscellaneous
    {
      echo
        "<h5 class='header light'>Approval of Miscellaneous</h5>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cash_exp(".$id.")'>Approve Cash</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_dd_exp(".$id.")'>Approve DD</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_cheque_exp(".$id.")'>Approve Cheques</button>
          <button class='btn waves-effect waves white indigo-text darken-4' onclick='approve_net_exp(".$id.")'>Approve NET Banking</button>";

      echo "<div id='select_approve_option_exp'></div>";
    }

?>
</div>
</div>
<?php
  }
  else if((isset($_SESSION['name_fin']))&&(!isset($_REQUEST['id']))||((!isset($_SESSION['name_fin']))&&(!isset($_REQUEST['id']))))
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