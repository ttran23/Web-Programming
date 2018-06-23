<?php
include 'oneFunction.php';
echo 1 + 3;
// Add many more asserts
assert(3 == firstNInts(2));
assert(6 == firstNInts(3));
assert(10 == firstNInts(4));
assert(15 == firstNInts(5));
assert(21 == firstNInts(6));
assert(28 == firstNInts(7));
?>