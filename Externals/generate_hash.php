<?php
function generateHash()
{
		$RandomStr = base64_encode(microtime());
		$ResultStr = md5(substr($RandomStr,0,10));
		$ResultStr = substr(strtolower($ResultStr),0,10);
		return $ResultStr;
}
?>