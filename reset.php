<?php

$xml=simplexml_load_file('data.xml');
		
		foreach($xml->entry as $entry)
		{
			
			$entry->count =0 ;
		}
		
		$xml->asXML('data.xml');

?>
