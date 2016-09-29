      <div class="default_content">
        <h1>Sensor #<?= $sensorid ?>: <?= $sensortype ?> for week <?= $weeknumber ?> of <?= $year ?></h1>
        <p>
          Available sensors:
<?php foreach ($sensors as $key => $value) {
  if( $value['sensorid'] != $tmpsensorid ){
    if( isset($tmpsensorid) ){
?>
            ) -
<?php
    }
    $tmpsensorid = $value['sensorid'];
?>
            <?= $value['sensorid'] ?> (
<?php
  }
?>
            <a href="/circular/<?= $value['sensorid'] ?>/<?= $value['type'] ?>/<?= $year ?>/<?= $weeknumber ?>"><?= $value['type'] ?></a>
<?php
}
?>
            )
        </p>
        <p>
          <a href="/circular/<?= $sensorid ?>/<?= $sensortype ?>/<?= $prev['year'] ?>/<?= $prev['weeknumber'] ?>">Previous week</a>
          <a href="/circular/<?= $sensorid ?>/<?= $sensortype ?>/<?= $next['year'] ?>/<?= $next['weeknumber'] ?>">Next week</a>
        </p>
        <p id="circular"></p>
        <p id="info"></p>
      </div>
