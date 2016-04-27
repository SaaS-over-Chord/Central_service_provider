<?php

$file = 'somefile.txt';
$searchfor = 'name';

// the following line prevents the browser from parsing this as HTML.
header('Content-Type: text/plain');

// get the file contents, assuming the file to be readable (and exist)
$contents = file_get_contents($file);
// escape special characters in the query
$pattern = preg_quote($searchfor, '/');
// finalise the regular expression, matching the whole line
$pattern = "/^.*$pattern.*\$/m";
// search, and store all matching occurences in $matches
if(preg_match_all($pattern, $contents, $matches)){
   echo "Found matches:\n";
   echo implode("\n", $matches[0]);
}
else{
   echo "No matches found";
}


if($_POST['request']=='post')
{
	echo 'ip was'.$_POST['ip'];
	Singleton::getInstance()->$arr[$_POST['ip']]++;
	echo 'value is'.Singleton::getInstance()->$arr[$_POST['ip']];
	
}
?>
