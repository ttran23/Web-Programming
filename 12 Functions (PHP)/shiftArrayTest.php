<?php
include 'shiftArray.php';
echo "start";
assert( [1,2,3] == shiftArray( [3,1,2] ));
print_r(shiftArray([1,2,3]));
assert( [3,2,1] == shiftArray( [2,1,3] ));
print_r(shiftArray([2,1,3]));
?>