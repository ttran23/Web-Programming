<!-- 
Tam Tran
February 28, 2018
Project 6 - 12PHPFunctions
 -->

<?php
// FileName: 12FunctionsTest.php
// This unit test tests 12 different PHP functions using the PHP assert function,
// that is like the JavaScript PHP function, except use only assert as in
//    assert (1+2 == 3);  // no "console."
include '12Functions.php';

// 1) howSwedish
echo "Performing howSwedish asserts\n";
assert( 2 == howSwedish ( "abbabba" ) );
assert( 0 == howSwedish ( 'no' ) );
assert( 1 == howSwedish ( 'axxc AbBa Xx' ) );
assert( 2 == howSwedish ( 'abbabba' ) );
assert( 0 == howSwedish ( 'a b b a' ) );
assert( 1 == howSwedish ( 'aaaaabbabb' ) );
assert( 0 == howSwedish ( 'aba' ) );
assert( 4 == howSwedish ( 'abbabbabbaxabba' ) );
echo "Completed howSwedish asserts\n\n";

// 2) mirrorEnds
echo "Performing mirrorEnds asserts\n";
assert( "" 	== mirrorEnds( "" ) );
assert( "" 	== mirrorEnds( "abcde" ) );
assert( "a" 	== mirrorEnds( "abca" ) );
assert( "aba" 	== mirrorEnds( "aba" ) );
assert( "" 	!= mirrorEnds( "a" ) );
assert( "zz" 	== mirrorEnds( "zzXYSzz" ) );
assert( "ab" 	== mirrorEnds( "abcdba" ) );
assert( "abcba" ==  mirrorEnds( "abcba" ) );
echo "Completed mirrorEnds asserts\n\n";

// 3) isStringSorted
echo "Performing isStringSorted asserts\n";
assert( isStringSorted("") ); 	// returns true
assert( isStringSorted("a") );	// returns true
assert( isStringSorted("abbcddef") ); 	// returns true
assert( isStringSorted("123456") );		// returns true
assert( !isStringSorted("12321") );		// returns false
echo "Completed isStringSorted asserts\n\n";

// 4) maxBlock
echo "Performing maxBlock asserts\n";
assert( 0 == maxBlock("") ); 				// returns 0
assert( 1 == maxBlock("wefargq") );			// returns 1
assert( 1 == maxBlock("w") );				// returns 1
assert( 2 == maxBlock("hoopla") );			// returns 2
assert( 3 == maxBlock("abbCCCddBBBxx") );	// returns 3
assert( 4 == maxBlock("zzzz") ); 			// returns 4
assert( 5 == maxBlock("yyyyzzzzzxxxyyy") ); // returns 5
echo "Completed maxBlock asserts\n\n";

// 5) isArraySorted
echo "Performing isArraySorted asserts\n";
assert( isArraySorted( ['a', 'b', 'c', 'd'] ) ); // returns true
assert( !isArraySorted( ['c', 'b', 'c', 'd'] ) ); // returns false
assert( isArraySorted( ['abe', 'ben', 'bic', 'den'] ) ); // returns true
assert( !isArraySorted( ['cat', 'cab', 'car', 'card'] ) ); // returns false
assert( isArraySorted( [1, 3, 5, 7] ) ); // returns true
assert( !isArraySorted( [1, 1, 2, 1] ) ); // returns false
echo "Completed isArraySorted asserts\n\n";

// 6) numberOfPairs
echo "Performing numberOfPairs asserts\n";
assert( 0 == numberOfPairs( ['a', 'b', 'c'] ) );
assert( 2 == numberOfPairs( ['a', 'a', 'a'] ) );
assert( 2 == numberOfPairs( ['a', 'a', 'b', 'b' ]) );
assert( 0 == numberOfPairs( [] ) );
assert( 0 == numberOfPairs( ['a'] ) );
echo "Completed numberOfPairs asserts\n\n";

// 7) frequency
echo "Performing frequency asserts\n";
assert( [0,5,0,0,2,0,0,0,0,0,0] == frequency( [1,1,1,4,4,1,1] ) );
assert( [1,0,1,1,2,1,0,0,0,0,1] == frequency( [0,5,2,3,4,4,10] ) );
assert( [0,0,0,0,0,0,0,0,0,0,0] == frequency( [] ) );
assert( [1,1,1,1,1,1,1,1,1,1,1] == frequency( [0,1,2,3,4,5,6,7,8,9,10] ) );
echo "Completed frequency asserts\n\n";

//8) shiftNTimes
echo "Performing shiftNTimes asserts\n";
assert( [4,5,6,7,1,2,3] == shiftNTimes( [1, 2, 3, 4, 5, 6, 7], 3 ) );
assert( [3,1,2] == shiftNTimes( [1, 2, 3], 5 ) );
assert( [3] == shiftNTimes( [3], 5 ) );
echo "Completed shiftNTimes asserts\n\n";

// 9) addToSet
echo "Performing addToSet asserts\n";
$set = array ();
addToSet ( $set, 5 );
addToSet ( $set, 4 );
addToSet ( $set, 4 );
addToSet ( $set, 3 );
addToSet ( $set, 3 );
addToSet ( $set, 2 );
addToSet ( $set, 2 );
print_r ( $set );
assert ( 5 == $set [0] );
assert ( 4 == $set [1] );
assert ( 3 == $set [2] );
assert ( 2 == $set [3] );
assert ( 4, count ( $set ) );
echo "Completed addToSet asserts\n\n";

// 10) countClumps
echo "Performing countClumps asserts\n";
assert( 0 == countClumps( [ 1, 2, 3] ) );
assert( 1 == countClumps( [ 1, 2, 2, 2, 2, 3] ) );
assert( 2 == countClumps( [ 1, 2, 2, 3, 4, 4 ] ) );
assert( 2 == countClumps( [ 1, 1, 2, 1, 1 ] ) );
assert( 1 == countClumps( [ 1, 1, 1, 1, 1 ] ) );
assert( 0 == countClumps( [ 1, 2, 3] ) );
assert( 0 == countClumps( [ 2 ] ) );
echo "Completed countClumps asserts\n\n";

// 11) evenOdd
echo "Performing evenOdd asserts\n";
$set = array(3, 2, 3, 2);
evenOdd( $set );
assert( $set[0] == 2 );
assert( $set[1] == 2 );
assert( $set[2] == 3 );
assert( $set[3] == 3 );

$set = array(66, 69, 2314, 231);
evenOdd( $set );
assert( $set[0] == 2314 );
assert( $set[1] == 66 );
assert( $set[2] == 69 );
assert( $set[3] == 231 );
echo "Completed evenOdd asserts\n\n";

// 12) writeAshape
echo "Performing writeAshape asserts\n";
writeAShape(6, "x");
echo "Completed writeAshape asserts\n\n";

?>