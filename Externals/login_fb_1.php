<?php
	// Inclusion of libraries
	require_once($_SERVER['DOCUMENT_ROOT'].'/externals/lib/Facebook/FacebookSession.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/externals/lib/Facebook/FacebookRequest.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/externals/lib/Facebook/FacebookResponse.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/externals/lib/Facebook/FacebookSDKException.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/externals/lib/Facebook/FacebookRequestException.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/externals/lib/Facebook/FacebookRedirectLoginHelper.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/externals/lib/Facebook/FacebookAuthorizationException.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/externals/lib/Facebook/GraphObject.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/externals/lib/Facebook/GraphUser.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/externals/lib/Facebook/GraphSessionInfo.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/externals/lib/Facebook/Entities/AccessToken.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/externals/lib/Facebook/HttpClients/FacebookCurl.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/externals/lib/Facebook/HttpClients/FacebookHttpable.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/externals/lib/Facebook/HttpClients/FacebookCurlHttpClient.php');
	
	//Libraries

	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestExpection;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\GraphUser;
	use Facebook\GraphSessionInfo;
	use Facebook\FacebookCurl;
	use Facebook\FacebookHttpable;
	use Facebook\FacebookCurlHttpClient;
	

	//starting session
	session_start();
	$app_id = '1059508910726718';
	$app_secret = '42723b60a9641fcd2c928f567de80dd4';
	$redirect_url='http://vitgravitas.com/externals/login_fb_1.php';

	//helper object
	FacebookSession::setDefaultApplication($app_id,$app_secret);
	$helper = new FacebookRedirectLoginHelper($redirect_url);
	$sess=$helper->getSessionFromRedirect();

	if(isset($_SESSION['name']))
	{
			header('Location: http://vitgravitas.com/externals/index.php');
	}

	if(isset($sess))
	{
		$request=new FacebookRequest($sess,'GET','/me');
		$response= $request->execute();
		$graph = $response->getGraphObject(GraphUser::classname());
		$name = $graph->getName();
		$id = $graph->getId();
		$_SESSION['name']=$name;
		$_SESSION['id']=$id;
		if(isset($_SESSION['name']))
		{
			echo "<script type='JavaScript/text'>window.open('http://vitgravitas.com/externals/event_page.php')</script>";
	 	}
		echo $_SESSION['name'];
		echo $_SESSION['id'];
	}
	else
	{
		echo 'Please <a href="'.$helper->getLoginUrl().'">Login.</a>';
	}
?>