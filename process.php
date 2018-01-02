<?php
if (defined('STDIN')) { //a simple way to check if script is running from browser or cli. 
	require_once('logprocessor.php');
	$logObj = new logprocessor;
	
	$arguements = array_slice($argv, 2);
	foreach($arguements as $value)
	{
		if ($fh = fopen($value, "rb")) {
			while (!feof($fh)) {
				$contents[] = fgets($fh);
			}
			fclose($fh);
		}	
	}
	
	//array_push($contents,"2016-12-12 this is a log line 1 [warning]","2016-12-12 this is a log line 2 [warning]","2016-12-12 this is a log line 3 [error]","2016-12-13 this is a log line 4 [error]","2016-12-14 this is a log line 5 [error]","2016-12-14 this is a log line 6 [warning]");
	
	echo $logObj->getLogSummary($contents);	

}
?>
