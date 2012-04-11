<?php

	$url = htmlspecialchars($_GET['url']);
	
	//Regular Expression to make sure what we're pulling is on distillery which is on AWS
	if(!preg_match('#^(http://distilleryimage[0-9]+\.(s3\.amazonaws|instagram)\.com/[a-z0-9\_\-]+\.(jpg|png))?$#',$url) && !preg_match('#^(http://distillery+\.(s3\.amazonaws|instagram)\.com/(media/\d{4}/\d{1,2}/\d{1,2}/[a-z0-9\_\-]|[a-z0-9\_\-])+\.(jpg|png))?$#',$url)){
		echo "Not valid URL";
		exit(); //Kill it 
	}
	//All good,  download
	header('Content-Description: File Transfer');
	header("Content-type: application/octet-stream");
	header("Content-disposition: attachment; filename= ".$url."");
	readfile($url);
?>