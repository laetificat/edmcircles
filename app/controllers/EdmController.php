<?php

/**
 * The main controller for the app
 *
 * @category   Edm
 * @package    Edm
 * @subpackage None
 * @copyright  Copyright (c) 2014 Kevin Heruer (http://www.laetificat.com)
 * @version    Release: 1
 * @link       http://laetificat.com
 * @since      Class available since Release 1.0.0
 */

class EdmController extends BaseController {
	
	public function getSubs($youtubers) {
		
		$ytarray = array();
		
		foreach($youtubers as $youtuber) {
			
			$url = "http://gdata.youtube.com/feeds/api/users/{$youtuber}?v=2&alt=json";
			
			$json = file_get_contents($url);
			$data = json_decode($json, TRUE);
			
// 			dd($data);
			
			$ytarray[$data['entry']['yt$username']['$t']] = $data['entry']['yt$statistics']['subscriberCount'];
			$icon[$data['entry']['yt$username']['$t']] = $data['entry']['media$thumbnail']['url'];
			
// 			var_dump($data['entry']['yt$statistics']['subscriberCount']);
			
		}
		
// 		echo "The channel with the highest subscriber number is: {$this->max($ytarray)}<br />";
// 		echo "The channel with the lowest subscriber number is: {$this->lowest($ytarray)}<br />";
// 		echo "The average ammount of subscribers is: {$this->average($ytarray)}<br />";
// 		echo "The total ammount of subscribers is: {$this->total($ytarray)}<br />";
		
// 		$perc = array();
		$perc = $this->percentage($ytarray, $this->total($ytarray));
// 		dd($perc);
		return $perc;
	}
	
	public function getIcon($user) {
		
		$name = str_replace(' ', '', $user);
		
		$url = "http://gdata.youtube.com/feeds/api/users/{$name}?v=2&alt=json";
			
		$json = file_get_contents($url);
		$data = json_decode($json, TRUE);
		
		$icon = $data['entry']['media$thumbnail']['url'];
		
		return $icon;
		
	}
	
	public function total($data) {
		
		$total = 0;
		
		foreach($data as $item) {
				
			$total += $item;
				
		}
		
		return $total;
		
	}
	
	public function max($data) {
		
		$max = max($data);
		
		return $max;
		
	}
	
	public function lowest($data) {
		
		$min = min($data);
		
		return $min;
		
	}
	
	public function average($data) {
		
		$average = ceil($this->max($data) / count($data));
		
		return $average;
		
	}
	
	public function percentage($data, $total) {
		
		$percentarray = array();
		
		foreach($data as $item => $key) {
			
			$percentarray[$item]['percent'] = round($key / $total * 100, 2);
			$percentarray[$item]['icon'] = $this->getIcon($item);
			
		}

// 		$percent = 87789 / 3627126 * 100;
		
		return $percentarray;
		
	}
	
}


/**
 * NOTES
 * COPYRIGHT KEVIN HERUER
 * LAETIFICAT
 */

//3627126



