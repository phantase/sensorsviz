<?php

$jsLibraries["dist"][] = "d3.v3.min";
$jsLibraries["dist"][] = "circularHeatChart";
$jsLibraries["assets"][] = "circular";
$cssLibraries["assets"][] = "circular";

try {

  $weeknumber = filter_input(INPUT_GET, 'weeknumber');
  $weeknumber = $weeknumber?$weeknumber:date('W')-1;
  $year = filter_input(INPUT_GET, 'year');
  $year = $year?$year:date('Y');
  $sensortype = filter_input(INPUT_GET, 'sensortype');
  $sensortype = $sensortype?$sensortype:"temperature";
  $sensorid = filter_input(INPUT_GET, 'sensorid');
  $sensorid = $sensorid?$sensorid:20;

  $prev['weeknumber'] = (($weeknumber - 1)>0)?($weeknumber - 1):52;
  $prev['year'] = (($weeknumber - 1)>0)?$year:$year-1;
  $next['weeknumber'] = (($weeknumber + 1)<53)?($weeknumber + 1):1;
  $next['year'] = (($weeknumber + 1)<53)?$year:$year+1;

  $tsdate = strtotime($year.'W'.$weeknumber);
  $date = date('Y-m-d 00:00:00',$tsdate);

  $data = getWeeklyValues($date,$sensorid,$sensortype);

  $phpdata = array();

  $timestamp = $tsdate;
  $cpt = 0;
  foreach ($data as $key => $value) {
    while($timestamp < strtotime($value['rounded_date'])){
      $cpt++;
      $phpdata[] = array("average"=>null,
                        "min"=>null,
                        "max"=>null,
                        "rounded_date"=>date('Y-m-d H:00:00',$timestamp));
      $timestamp += 3600;
      if( $cpt == 168 ){
        break;
      }
    }
    $timestamp = strtotime($value['rounded_date']) + 3600;
    if($cpt == 168){ break; }
    $cpt++;
    $phpdata[] = $value;
  }

} catch(Exception $e) {
  $include_page = "error";
}

include_once("mvc/views/pages/skeleton.php");
