<?php


		$addr=$_POST['ip'];
		$xml=simplexml_load_file('data.xml');
		
		//$addr="ssh://".$ip;
		foreach($xml->entry as $entry)
		{
			if($entry->ip==$addr)
			{
				echo "found";
				$count=$entry->count; //update the entry IP by 1
				$count=$count+1;
				$entry->count=$count;
				echo 'updated'.$_POST['ip'].'to'."new".$entry->count;
				//echo "new".$entry->count;
			}
		}
		
		$xml->asXML('data.xml');
	
		
?>