<?php
$memory = [1023, 1048576, 1024, 0];

$sequence = $memory[0];
$start = $memory[1];
$length = $memory[2];

$result = $sequence << 48;
$result |= $start << 24;
$result |= $length;
$memory[3] = $result;

printf('start 0x%x, sequence 0x%x, length 0x%x, result 0x%x' . PHP_EOL,
	$start, $sequence, $length, $result);
