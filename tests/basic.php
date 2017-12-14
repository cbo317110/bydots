<?php

require('../src/byDots.php');

$test = [
	'words' => ['integer', 'string'],
	'titles' => [
	]
];

setByDots( $test, 'titles.countries', ['Brazil', 'Spain'] );
addByDots( $test, 'words', 'Neto');
getByDots( $test, 'titles' );
delByDots( $test, 'titles.countries.1');


var_dump($test);