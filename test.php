<?php
//CMS detection framework, v0.1
//https://github.com/ggtd/cms-detector
//=============================================
//author: Tomas Dobrotka
//web: www.dobrotka.sk
//contact: tomas@dobrotka.sk

include("cms_detect.php");

$cms=new cms_detect();
$cms->go('http://www.somehost.tld/');


echo "\n----------------------------------------------\n";
print_r($cms->hit);
echo "\n----------------------------------------------";
echo "\nURL To try: ".$cms->url;
echo "\nMost possible CMS: ".$cms->cms;
echo "\nDetected CMS Index: ".$cms->hitindex;
echo "\n----------------------------------------------\n";



?>
