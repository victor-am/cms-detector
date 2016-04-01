<?php
//Bulk WordPress Detector
//https://github.com/victoryam/cms-detector
//=============================================
//author: Victor A.M.
//contact: victor@victoryam.com.br

error_reporting(E_ERROR | E_PARSE);
include("cms_detector.php");

$urls = [
"http://blogurl.com/path"
];

$wordpress = [];
$non_wordpress = [];
$undefined = [];

$index = 0;
while($index <= count($urls)) {
  $cms=new cms_detect();
  $cms->go($urls[$index]);
  echo "\n----------------------------------------------";
  echo "\nURL To try: ".$cms->url;
  echo "\nMost possible CMS: ".$cms->cms;
  echo "\nDetected CMS Index: ".$cms->hitindex;
  echo "\n----------------------------------------------\n";

  if ($cms->cms == "wordpress") {
    array_push($wordpress, $urls[$index]);
  }
  elseif ($cms->cms != null) {
    array_push($non_wordpress, $urls[$index]);
  }
  else {
    array_push($undefined, $urls[$index]);
  }

  $index++;
}

echo "\n----------------------------------------------\n";
echo "WordPress: \n";
print_r($wordpress);
echo "\n----------------------------------------------\n";
echo "Not WordPress: \n";
print_r($non_wordpress);
echo "\n----------------------------------------------\n";
echo "Undefined: \n";
print_r($undefined);

?>
