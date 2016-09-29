<?php

$jsLibraries["dist"][] = "d3.v3.min";
$jsLibraries["dist"][] = "circularHeatChart";
$jsLibraries["assets"][] = "circularheat";
$cssLibraries["assets"][] = "circularheat";

try {

  $weeknumber = filter_input(INPUT_GET, 'weeknumber', FILTER_VALIDATE_INT);
  $weeknumber = $weeknumber?$weeknumber<10?'0'.$weeknumber:$weeknumber:date('W')-1;
  $year = filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT);
  $year = $year?$year:date('Y');

  $prev['weeknumber'] = (($weeknumber - 1)>0)?($weeknumber - 1):52;
  $prev['year'] = (($weeknumber - 1)>0)?$year:$year-1;
  $next['weeknumber'] = (($weeknumber + 1)<53)?($weeknumber + 1):1;
  $next['year'] = (($weeknumber + 1)<53)?$year:$year+1;

  $tsdate = strtotime($year.'W'.$weeknumber);
  $date = date('Y-m-d 00:00:00',$tsdate);

  $phpdata = getWeeklyValues($date,20,"temperature");

} catch(Exception $e) {
  $include_page = "error";
}

include_once("mvc/views/pages/skeleton.php");
