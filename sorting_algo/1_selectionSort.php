<?php

// selection sort
function selectionSort(&$numbers, $length)
{
	for($i = 0; $i < $length ; $i++)    //outer loop
	{
		$low = $i;
		for($j = $i + 1; $j < $length ; $j++)    //inner loop
		{
			if ($numbers[$j] < $numbers[$low])
			{
				$low = $j;
			}
		}
		
		// swap the minimum value to $ith node
		if ($numbers[$i] > $numbers[$low])
		{
			$tmp_value = $numbers[$i];
			$numbers[$i] = $numbers[$low];
			$numbers[$low] = $tmp_value;
		}
	}
}

$numbers = array(64, 25, 12, 22, 11);
$length = count($numbers);
selectionSort($numbers, $length);
echo "Sorted array : \n";

for ($i = 0; $i < $length; $i++)
	echo $numbers[$i] . " ";


	
// Time Complexity: O(N2)
// Auxiliary Space: O(1)	

?>
