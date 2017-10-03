<?php
/* "memory" contains transfer sequence; offset; limit; placeholder for below result */
$memory = [1023, 1048576, 1024, 0];

/* Load local variables; on CRAY-1 these are transfers to CPU registers */
$sequence = $memory[0];
$start = $memory[1];
$length = $memory[2];

/* Pack into a single 64-bit value and store to "memory" */
$result = $sequence << 48;
$result |= $start << 24;
$result |= $length;
$memory[3] = $result;

printf('start 0x%x, sequence 0x%x, length 0x%x, result 0x%x' . PHP_EOL,
	$start, $sequence, $length, $result);
