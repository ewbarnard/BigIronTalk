<?php
/* "memory" contains transfer sequence; offset; limit; placeholder for below result */
$memory = [511, 1048576, 1024, 0];

/* Load local variables; on CRAY-1 these are transfers to CPU registers */
$sequence = $memory[0];
$start = $memory[1];
$length = $memory[2];

/* Pack into a single 64-bit value and store to "memory" */
$result = $sequence << 48;
$result |= $start << 24;
$result |= $length;
$memory[3] = $result;

printf('sequence 0%o, start 0%o, length 0%o, result 0%o' . PHP_EOL,
	$sequence, $start, $length, $result);
