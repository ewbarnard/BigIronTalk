<?php
/* "memory" contains result of listing1 processing */
$memory = [511, 1048576, 1024, 07770400000000002000];
$mask16bits = 0xffff;
$mask24bits = 0xffffff;

/* Extract fields from packed result */
$result = $memory[3];
$sequence = ($result >> 48) & $mask16bits;
$start = ($result >> 24) & $mask24bits;
$length = $result & $mask24bits;

/* Increment for next transfer, mask off any overflows */
$sequence = (++$sequence) & $mask16bits;
$start = ($start + $length) & $mask24bits;
$result = ($sequence << 48) | ($start << 24) | $length;
$memory[0] = $sequence;
$memory[1] = $start;
$memory[2] = $length;
$memory[3] = $result;

printf('sequence 0%o, start 0%o, length 0%o, result 0%o' . PHP_EOL,
	$sequence, $start, $length, $result);
