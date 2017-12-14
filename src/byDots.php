<?php

function getByDots(array &$root, string $pieces)
{
	foreach ( explode('.', $pieces) as $piece ) {
		if ( !array_key_exists($piece, $root) ) return false;
		$root = &$root[$piece];
	}
	return $root;
}

function addByDots(array &$root, string $pieces, $value)
{
	foreach ( explode('.', $pieces) as $piece ) {
		if ( !array_key_exists($piece, $root) ) return false;
		$root = &$root[$piece];
	}
	if( is_array($root) ) $root[] = $value;
}

function setByDots(&$root, $pieces, $value)
{
	$pieces = explode('.', $pieces);
    while(count($pieces) > 1) {
        $key = array_shift($pieces);
        if(!isset($root[$key])) $root[$key] = [];
        $root = &$root[$key];
    }
    $key = reset($pieces);
    $root[$key] = $value;
}

function delByDots(&$root, $pieces)
{
	$pieces = explode('.', $pieces);
    while( count($pieces) > 1 ) {
    	$key = array_shift($pieces);
        if(!isset($root[$key])) $root[$key] = [];
        $root = &$root[$key];
    }
    $key = reset($pieces);
   	unset($root[$key]);
}