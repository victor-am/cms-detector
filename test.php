<?php
//CMS detection test/demo, PHP-CLI version

include("cms_detect.php");

$cms=new cms_detect();


//$cms->go('http://www.svetdomen.sk/');
$cms->go('http://www.svetdomen.sk/forum/');


echo "\n----------------------------------------------\n";
print_r($cms->hit);
echo "\n----------------------------------------------";
echo "\nURL To try: ".$cms->url;
echo "\nMost possible CMS: ".$cms->cms;
echo "\nDetected CMS Index: ".$cms->hitindex;
echo "\n----------------------------------------------\n";



?>