<?php

$edm = new EdmController();

$uploaders = array(

	'OneChilledPanda' => 'OneChilledPanda',
	'MonstercatMedia' => 'MonstercatMedia',
	'MrSuicideSheep' => 'MrSuicideSheep',
	'goingquantum' => 'goingquantum',
	'TastyNetwork' => 'TastyNetwork',
	'MusicVVawe' => 'MusicVVawe',
	'PandoraMuslc' => 'PandoraMuslc',
	'TrapandBass' => 'TrapandBass',
	'UndergroundDubstep' => 'UndergroundDubstep',
	'FunkyyPanda' => 'FunkyyPanda',
	'spreadthejams' => 'spreadthejams',
	'oNlineRXD' => 'oNlineRXD',
	'MrDeepSense' => 'MrDeepSense',
	'AdversedMedia' => 'AdversedMedia',
	'wobblecraftdubz' => 'wobblecraftdubz',
	'MelbourneBeats' => 'MelbourneBeats',
	'MaxikingXXX' => 'MaxikingXXX',
	'HenrichAchberger' => 'HenrichAchberger',

);

$perc = $edm->getSubs($uploaders);

// dd($perc);

foreach($perc as $item => $key) {
	
// 	echo "<div class=\"circle\" style=\"width:{$item}%; min-height:auto; float:left; background-color:#000; position:inline-block;\">&nbsp;</div>";
	echo "<img src=\"{$key['icon']}\" style=\"width:{$key['percent']}%; min-height:auto; float:left;\"></img>";
	
}
