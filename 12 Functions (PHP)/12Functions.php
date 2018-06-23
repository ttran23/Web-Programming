<!-- 
Tam Tran
February 28, 2018
Project 6 - 12PHPFunctions
 -->

<?php
// File Name: 12Functions.php
//
// 1) howSwedish
// ABBA is a band, they have many songs including Dancing Queen, and
// Fernando. ABBA is actually a Swedish band, so if we wanted to find
// out howSwedish a String is, we could simply find out how many times
// the String contains the substring "abba". We want to look for this
// substring in a case insensitive manner. So "abba" counts, and so
// does "aBbA". We also want to check for overlapping abba's such as
// in the String "abbAbba" that contains "abba" twice.
//
// howSwedish("ABBA a b b a") returns 1
// howSwedish("abbabba!") returns 2
function howSwedish($str) {
	$count = 0;
	$lower = strtolower($str);
	for ($i = 0; $i < strlen($str); $i = $i + 1) {
		if (substr($lower, $i, 4) == "abba") {
			$count++;
		}
	}
  return $count;
}

// 2)  mirrorEnds
// Complete method mirrorEnds that given a string, looks for a mirror
// image (backwards) string at both the beginning and end of the given string.
// In other words, zero or more characters at the very beginning of the given
// string, and at the very end of the string in reverse order (possibly overlapping).
// For example, "abXYZba" has the mirror end "ab".
//
// assert("" == mirrorEnds(""));
// assert("" == mirrorEnds("abcde"));
// assert("a" == mirrorEnds("abca"));
// assert("aba" ==  mirrorEnds("aba"));
//
function mirrorEnds($str) {
	$count = 0;
	$j = strlen($str) - 1;
	for ($i = 0; $i < strlen($str); $i = $i + 1) {
		if ($str[$i] != $str[$j]) {
			break;
		}
		$j = $j - 1;
		$count = $count + 1;
	}
  	return substr($str, 0, $count);
}

// 3) isStringSorted
// Given a String, return true if the letters are in ascending order.
// Note: 'a' < 'b' and '5' < '8'
// isStringSorted("") returns true
// isStringSorted("a") returns true
// isStringSorted("abbcddef") returns true
// isStringSorted("123456") returns true
// isStringSorted("12321") returns false
function isStringSorted($str) {
  	for ($i = 0; $i < strlen($str) - 1; $i = $i + 1) {
  		if ($str[$i] > $str[$i+1]) {
  			return false;
  		}
 	}
  	return true;
}

// 4) maxBlock
// Given a string, return the length of the largest "block" in the string.
// A block is a run of adjacent chars that are the same.
// maxBlock("hoopla") returns 2
// maxBlock("abbCCCddBBBxx") returns 3
// maxBlock("") returns 0
//
function maxBlock($str) {
	$max = 0;
	$curr = 1;
	for ($i = 0; $i < strlen($str) - 1; $i = $i + 1) {
  		if ($str[$i] == $str[$i+1]) {
  			$curr = $curr + 1;
  		}
  		else {
  			if ($curr > $max) {
  				$max = $curr;
  			}
  			$curr = 1;
  		}
	}
	if ($curr == strlen($str)) {
		$max = $curr;
	}
	return $max;
}

// 5) isArraySorted
// Given an array , return true if the element are in ascending order.
// Note: 'abe' < 'ben' and 5 > 3
// Precondition $arr has all the same type of elements
function isArraySorted($arr) {
	for ($i = 0; $i < count($arr) - 1; $i = $i + 1) {
		if ($arr[$i] > $arr[$i+1]) {
			return false;
		}
	}
  	return true;
}

// 6) numberOfPairs
//
// Return the number of times a pair occurs in array. A pair is any two String values that are equal (case
// sensitive) in consecutive array elements. The array may be empty or have only one element. In both of
// these cases, return 0.
//
// numberOfPairs( ['a', 'b', 'c'] ) returns 0
// numberOfPairs( ['a', 'a', 'a'] ) returns 2
// assert(2 == numberOfPairs( ['a', 'a', 'b', 'b'] ) );
// numberOfPairs(  [] ) returns 0
// numberOfPairs( ['a'] ) returns 0
//
// Precondition: $arr has all the same type of elements
function numberOfPairs($arr) {
	if (count($arr) <= 1) {
		return 0;
	}
	else {
		$count = 0;
		for ($i = 0; $i < count($arr) - 1; $i = $i + 1) {
			if ($arr[$i] == $arr[$i+1]) {
				$count = $count + 1;
			}
		}
		return $count;
	}
	
}

// 7) frequency($array)
//
// Given an  array of integers in the range of 0..10 (like quiz scores),
// return an array of 11 integers where the first value (at index 0) is the
// number of 0s in the array argument, the second value (at index 1) is the number
// of ones in the array and the 11th value (at index 10) is the number of
// tens in the array. The following asserts must pass.

// $arr = frequency([0, 1, 1, 8, 10, 10]);
// assert($arr[0] == 1);
// assert($arr[1] == 2);
// assert($arr[5] == 0);
// assert($arr[8] == 1);
// assert($arr[10] == 2);
//
// Precondition: $array has valid ints in the range of 0..10
function frequency($array) {
	$freq = array(0,0,0,0,0,0,0,0,0,0,0);
	for ($i = 0; $i < count($array); $i = $i + 1) {
		$freq[$array[$i]] = $freq[$array[$i]] + 1;
	}
	return $freq;
}

// 8) shiftNTimes(& $array, $numShifts)
//
// Modify array so it is "left shifted" n times -- so shiftNTimes(array(6, 2, 5, 3), 1)
// changes the array argument to (2, 5, 3, 6) and shiftNTimes(array(6, 2, 5, 3), 2)
// changes the array argument to (5, 3, 6, 2). You must modify the array argument by
// changing the parameter array inside method shiftNTimes. A change to the
// parameter inside the method shiftNTimes changes the argument if the
// argument is passed by reference, that means it is preceded by an ampersand &
//
// shiftNTimes( array(1, 2, 3, 4, 5, 6, 7), 3 ) modifies array to ( 4, 5, 6, 7, 1, 2, 3 )
// shiftNTimes( array(1, 2, 3), 5) modifies array to (3, 1, 2)
// shiftNTimes( array(3), 5) modifies array to (3)
//
function shiftNTimes($array, $numShifts) {
	if (count($array) != 0) {
		for ($i = 0; $i < $numShifts; $i = $i + 1) {
			$temp = array_shift($array);
			array_push($array, $temp);
		}
	}
	return $array;
}

// 9) addToSet
// Complete method addToSet(& $set, $number) such that number is added
// at the end of the array parameter set only if it does not exist alreay.
//
// Precondition: Each argument is always a number.  No type mixing allowed or tested for.
function addToSet(& $set, $number) {
	if (count($set) == 0) {
		array_push($set, $number);
	}
	else {
		$found = false;
		for ($i = 0; $i < count($set); $i = $i + 1) {
			if ($set[$i] == $number) {
				$found = true;
				break;
			}
		}
		if (!$found) {
			array_push($set, $number);
		}
	}
}


// 10)  Say that a "clump" in an array is a series of 2 or more adjacent elements of the same value.
// Return the number of clumps in the given array.
//
//  countClumps( array ( 1, 2, 2, 3, 4, 4 ) ) returns 2
//  countClumps( array(  1, 1, 2, 1, 1 ) ) returns 2
//  countClumps(array ( 1, 1, 1, 1, 1 ) ) returns 1
//  countClumps(array ( 1, 2, 3) ) returns 0
//  countClumps(array ( 2) ) returns 0
function countClumps($arr) {
	$count = 0;
	$clump = false;
	for ($i = 0; $i < count($arr) - 1; $i = $i + 1) {
		if ($clump == true && $arr[$i] == $arr[$i + 1]) {
			continue;
		}
		else if ($arr[$i] == $arr[$i+1]) {
			$count = $count + 1;
			$clump = true;
		}
		else {
			$clump = false;
		}
	}
	return $count;
}

// assert ( 0, countClumps ( array (
//     1,
//     2,
//     3 ) ) );
// assert ( 1, countClumps ( array (
//     1,
//     2,
//     2,
//     2,
//     2,
//     3 ) ) );

// 11) evenOdd(array)
//
// Modify array that contains the exact same numbers as the given array, but rearranged so that all
// the even numbers come before all the odd numbers. Other than that, the numbers can be in any order.
//
// evenOdd(array(1, 0, 1, 0, 0, 1, 1)) changes the array to array(0, 0, 0, 1, 1, 1, 1)
// evenOdd(array(3, 3, 2)) changes the array to (2, 3, 3)
// evenOdd((2, 2, 2)) changes the array to (2, 2, 2)
//
// Precondition: All array elements are integers (whole numbers)
function evenOdd(& $array) {
	$new = array();
	for ($i = 0; $i < count($array); $i = $i + 1) {
		if ($array[$i] % 2 == 0) {
			array_unshift($new, $array[$i]);
		}
		else {
			array_push($new, $array[$i]);
		}
	}
	for ($i = 0; $i < count($array); $i = $i + 1) {
		$array[$i] = $new[$i];
	}
}

// 12) writeAshape
//
// This method must generate a triangle that is written to the web page.
// Here is a triangle of height 6. There are no leading spaces this time.
//
// x
// xxx
// xxxxx
// xxxxxxx
// xxxxxxxxx
// xxxxxxxxxxx
//
// Precondition: n >= 1 and ch is not a empty string or a space

function writeAShape($n, $ch) {
 	for ($i = 0; $i < $n; $i = $i + 1) {
 		for ($j = 0; $j < ($i * 2) + 1; $j = $j + 1) {
 			print $ch;
 		}
 		print "\n";
 	}
}

// writeAShape(6, "x");

?>
