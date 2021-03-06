<?php

function getAvailableSensorsAndTypes()
{
	global $bdd;

	$req = $bdd->prepare("SELECT sensorid, type FROM sensors_avg_data GROUP BY sensorid, type ORDER BY sensorid ASC, type ASC");
	$req->execute();

	$errorInfo = $req->errorInfo();

	if( $errorInfo[0] != "00000" ){
		throw new Exception("Error Processing Request: ".$errorInfo[2]);
	}

	return $req->fetchAll(PDO::FETCH_ASSOC);
}

function getWeeklyValues($date,$sensorid,$sensortype)
{
	global $bdd;

	$req = $bdd->prepare("SELECT average,min,max,rounded_date
												FROM sensors_avg_data
												WHERE sensorid = :sensorid
												AND type = :sensortype
												AND rounded_date >= :date
												AND interval_date = 'hour'
												ORDER BY rounded_date ASC
												LIMIT 168");
	$req->bindParam(':sensorid',$sensorid);
	$req->bindParam(':sensortype',$sensortype);
	$req->bindParam(':date',$date);
	$req->execute();

	$errorInfo = $req->errorInfo();

	if( $errorInfo[0] != "00000" ){
		throw new Exception("Error Processing Request: ".$errorInfo[2]);
	}

	return $req->fetchAll(PDO::FETCH_ASSOC);

}
