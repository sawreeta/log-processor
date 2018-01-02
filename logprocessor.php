<?php
class logprocessor{
	function getLogSummary($data){
		
		$summarylogs='';
		foreach($data as $lines){
			$linearray = explode(' this is a log line ',$lines);
			$statusdate[] = $linearray[0];			
				
			$statusarray  = explode(' ',$linearray[1]); 
			$statuss[] = trim($statusarray[1]); 
						
			$json[] = array($linearray[0]=>trim($statusarray[1]));
		}
		$dates = array_unique($statusdate);
		
		foreach($dates as $date){ 
			$logs = array_count_values(array_column($json, $date)); 
			
			if(array_key_exists('[warning]',$logs))
				$warning =' warning:'.$logs['[warning]'];
			else
				$warning = ' warning:0';
				
			if(array_key_exists('[error]',$logs))
				$error =' error:'.$logs['[error]'];
			else 
				$error =' error:0';
			
			$summarylogs .= $date.$warning.$error."\n";				
		}
		return $summarylogs;
	}
}
?>
