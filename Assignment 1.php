<?php
/**
 * Created by PhpStorm.
 * User: Teufel Hunden
 * Date: 1/25/2016
 * Time: 7:20 PM
 */
require "person.php";
$input_file = fopen("people.txt", "r");

$numbers = array();//associative array
$people = array();
//echo fgets($input_file);
flock($input_file, LOCK_SH) || die('Failed to lock the file!');
while(!feof($input_file)) {
	$line = rtrim(fgets($input_file));
	if ($line !== "") {
		$key_value_pairs = explode(":", $line);
		$person = new Person();
		foreach ($key_value_pairs as $key_value) {
			//echo "\n";//$key_value,
			$pairs = explode("=", $key_value);
			$key = $pairs[0];
			$value = $pairs[1];
			$numbers[$pairs[0]] = $pairs[1];
			switch ($key) {
				case "fname":
					$value = ucwords($value);
					$person->setFname($value);
					break;
				case "lname":
					$value = ucwords($value);
					$person->setLname($value);
					break;
				case "food":
					$person->setFood($value);
					break;
				case "color":
					$person->setColor($value);
					break;
				case "game":
					$person->setGame($value);
					break;
				case "lang":
					$person->setLang($value);
			}
		}
		$lname = $person->getLname();
		$fname = $person->getFname();
		$people[$lname . ", " . $fname] = $person;
		//add person to people array
	}

}

flock($input_file, LOCK_UN);


ksort($people);
$lname_array = array();
$fname_array = array();
$food_array = array();
$color_array = array();
$game_array = array();
$lang_array = array();
$output_file = fopen("output.txt", "w");
flock($output_file, LOCK_EX) || die('Failed to lock the file!');
echo "ICS-325 Assignment - Ben Mebust\n\n";
echo "File Input:\n";
echo file_get_contents("people.txt");
echo"\nTerminal Output:\n";

foreach($people as $person){
	$lname = $person->getLname();
	$fname = $person->getFname();
	$food = $person->getFood();
	$color = $person->getColor();
	$game = $person->getGame();
	$lang = $person->getLang();

	echo $lname . ", " . $fname;
	echo "\n\t color: " . $color;
	echo "\n\t food: " . $food;
	echo "\n\t food: " . $game;
	echo "\n\t food: " . $lang;
	Echo "\n";


	if (array_key_exists($lname, $lname_array)){
		$lname_array[$lname] += 1;
	}
	else {
		$lname_array[$lname] = 1;
	}

	if (array_key_exists($fname, $fname_array)){
		$fname_array[$fname] += 1;
	}
	else {
		$fname_array[$fname] = 1;
	}

	if (array_key_exists($color, $color_array)){
		$color_array[$color] += 1;
	}
	else {
		$color_array[$color] = 1;
	}

	if (array_key_exists($food, $food_array)){
		$food_array[$food] += 1;
	}
	else {
		$food_array[$food] = 1;
	}

	if (array_key_exists($game, $game_array)){
		$game_array[$game] += 1;
	}
	else {
		$game_array[$game] = 1;
	}

	if (array_key_exists($lang, $lang_array)){
		$lang_array[$lang] += 1;
	}
	else {
		$lang_array[$lang] = 1;
	}

}

echo "\nSummary\n";
echo "\tTotal records :" . count($people). "\n\n";
echo "\tColor\n";

foreach($color_array as $key => $value) {
	$total = count($people);
	$percentage = $value / $total;
	$percent_format = number_format($percentage * 100, 2) . '%';
	echo "\t\t $percent_format " . $key . "\n";
}
echo "\tFood\n";

foreach($food_array as $key => $value) {
	$total = count($people);
	$percentage = $value / $total;
	$percent_format = number_format($percentage * 100, 2) . '%';
	echo "\t\t $percent_format " . $key . "\n";
}
echo "\tGame\n";

foreach($game_array as $key => $value) {
	$total = count($people);
	$percentage = $value / $total;
	$percent_format = number_format($percentage * 100, 2) . '%';
	echo "\t\t $percent_format " . $key . "\n";
}
echo "\tLang\n";

foreach($lang_array as $key => $value) {
	$total = count($people);
	$percentage = $value / $total;
	$percent_format = number_format($percentage * 100, 2) . '%';
	echo "\t\t $percent_format " . $key . "\n";
}

fwrite($output_file, "File Output:\n");
foreach($people as $person) {
	$lname = $person->getLname();
	$fname = $person->getFname();
	$food = $person->getFood();
	$color = $person->getColor();

	fwrite($output_file, $fname . " " . $lname . " will have a " . $food . " in a " . $color . " box!\n");
}

flock($output_file, LOCK_UN);
fclose($input_file);
fclose($output_file);
