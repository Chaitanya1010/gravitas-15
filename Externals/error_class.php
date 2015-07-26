<?php 
    
   //require_once($_SERVER['DOCUMENT_ROOT'].'/externals/src/Facebook.php');
    echo $_SERVER['DOCUMENT_ROOT'].'/externals/src/Facebook.php';

    $config = array(
        'appId' => '1059508910726718',
        'secret' => '42723b60a9641fcd2c928f567de80dd4',
        'fileUpload' => false,
        'default_graph_version' => 'v2.2',
      );
    /*  
    $facebook= new Facebook($config);
    $user_id = $facebook->getUser();
    
    if($user_id)
    {
        //Here we have a user-Id which means the user is logged-in
        //if not we'll give an exception to handle the remaining
        try
        {
            $user_profile = $facebook->api('/me','GET');
            echo "</pre>";
            print_r($user_profile);
            echo "</pre>";
        }
        catch(FacebookApiException $e)
        {
            //if the user is logged out then the access token is in-valid.
            //then we'll throw this expection for user to login again
            $login_url=$facebook->getLoginUrl();
            echo 'Please <a href="'.$login_url.'">Login.</a>';
            error_log($e->getType());
            error_log($e->getMessage());
        }
    }
    else
    {
        //no user, so need to go from the starting
        $login_url=$facebook->getLoginUrl();
        echo 'No user logged-in. Please <a href="'.$login_url.'">login.</a>';
    }
    */
?>