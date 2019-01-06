<?php
namespace App\MyFiles;

class calculTarifs {
	public function prix() {
		// echo 'Pas de tarif communiqué';
		$heure = $booking->getDepartureTime();
		$heure = substr($heure, 0, 2);
		var_dump($heure);
	}
}