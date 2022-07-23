<?php

// Bubble Sort
function bubbleSort(&$numbers)
{
	$length = sizeof($numbers);

	// Traverse through all array elements
	for($i = 0; $i < $length; $i++)
	{
		// Last i elements are already in place
		for ($j = 0; $j < $length - $i - 1; $j++)
		{
			// traverse the array from 0 to n-i-1
			// Swap if the element found is greater
			// than the next element
			if ($numbers[$j] > $numbers[$j+1])
			{
				$temp_value = $numbers[$j];
				$numbers[$j] = $numbers[$j+1];
				$numbers[$j+1] = $temp_value;
			}
		}
	}
}


$numbers = array(64, 34, 25, 12, 22, 11, 90);

$length = sizeof($numbers);
bubbleSort($numbers);

echo "Sorted array : \n";

for ($i = 0; $i < $length; $i++)
	echo $numbers[$i]." ";


// Time Complexity: O(N2)
// Auxiliary Space: O(1)

?>
