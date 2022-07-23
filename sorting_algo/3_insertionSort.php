<?php
// insertion sort

// Function to sort an array
// using insertion sort
function insertionSort(&$numbers, $n)
{
	for ($i = 1; $i < $n; $i++)
	{
		$current_position = $numbers[$i];
		$j = $i-1;
	
		// Move elements of arr[0..i-1],
		// that are greater than key, to
		// one position ahead of their
		// current position
		while ($j >= 0 && $numbers[$j] > $current_position)
		{
			$numbers[$j + 1] = $numbers[$j];
			$j = $j - 1;
		}
		
		$numbers[$j + 1] = $current_position;
	}
}

// function to print an array of size n
function printArray(&$numbers, $length)
{
	for ($i = 0; $i < $length; $i++)
		echo $numbers[$i]." ";
	echo "\n";
}


$numbers = array(12, 11, 13, 5, 6);
$length = sizeof($numbers);
insertionSort($numbers, $length);
printArray($numbers, $length);


// Time Complexity: O(N^2) 
// Auxiliary Space: O(1)

?>
