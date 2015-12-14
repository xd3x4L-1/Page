<?php

	foreach($info as $val) {
		
		$items='';
		 
		foreach($info as $val) {
			 
			$konfigurera = null;
  
			$konfigurera = " class='konfigurera'";
        
			$items .= "<a {$konfigurera} href='" . 	create_url($val['url']) . "'>{$val['label']}</a>";
		}
    }
	
	echo ($items);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

