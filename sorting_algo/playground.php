<?php

// selection sort
function selection_sort(&$arr, $n)
{
	for($i = 0; $i < $n ; $i++)
	{
		$low = $i;
		for($j = $i + 1; $j < $n ; $j++)
		{
			if ($arr[$j] < $arr[$low])
			{
				$low = $j;
			}
		}
		
		// swap the minimum value to $ith node
		if ($arr[$i] > $arr[$low])
		{
			$tmp = $arr[$i];
			$arr[$i] = $arr[$low];
			$arr[$low] = $tmp;
		}
	}
}
// Driver Code
$arr = array(64, 25, 12, 22, 11);
$len = count($arr);
selection_sort($arr, $len);
echo "Sorted array : \n";

for ($i = 0; $i < $len; $i++)
	echo $arr[$i] . " ";
?>


<?php
// PHP program for implementation
// of Bubble Sort

function bubbleSort(&$arr)
{
	$n = sizeof($arr);
	// Traverse through all array elements
	for($i = 0; $i < $n; $i++)
	{
		// Last i elements are already in place
		for ($j = 0; $j < $n - $i - 1; $j++)
		{
			// traverse the array from 0 to n-i-1
			// Swap if the element found is greater
			// than the next element
			if ($arr[$j] > $arr[$j+1])
			{
				$t = $arr[$j];
				$arr[$j] = $arr[$j+1];
				$arr[$j+1] = $t;
			}
		}
	}
}

// Driver code to test above
$arr = array(64, 34, 25, 12, 22, 11, 90);

$len = sizeof($arr);
bubbleSort($arr);

echo "Sorted array : \n";

for ($i = 0; $i < $len; $i++)
	echo $arr[$i]." ";
?>


<?php
// PHP program for insertion sort

// Function to sort an array
// using insertion sort
function insertionSort(&$arr, $n)
{
	for ($i = 1; $i < $n; $i++)
	{
		$key = $arr[$i];
		$j = $i-1;
	
		// Move elements of arr[0..i-1],
		// that are greater than key, to
		// one position ahead of their
		// current position
		while ($j >= 0 && $arr[$j] > $key)
		{
			$arr[$j + 1] = $arr[$j];
			$j = $j - 1;
		}
		
		$arr[$j + 1] = $key;
	}
}

// A utility function to
// print an array of size n
function printArray(&$arr, $n)
{
	for ($i = 0; $i < $n; $i++)
		echo $arr[$i]." ";
	echo "\n";
}

// Driver Code
$arr = array(12, 11, 13, 5, 6);
$n = sizeof($arr);
insertionSort($arr, $n);
printArray($arr, $n);

?>



<?php
$try_array = array(8, 3, 9, 6, 7, 5, 4);
function merge_sort($v_array){
    	if(count($v_array) == 1 ) 
            return $v_array;
    	$mid = count($v_array) / 2;
        $left = array_slice($v_array, 0, $mid);
        $right = array_slice($v_array, $mid);
    	$left = merge_sort($left);
    	$right = merge_sort($right);
    	    return merge($left, $right);
    }
    function merge($left, $right){
    	$res = array();
    	while (count($left) > 0 && count($right) > 0){
    		if($left[0] > $right[0]){
    			$res[] = $right[0];
    			$right = array_slice($right , 1);
    		}else{
    			$res[] = $left[0];
    			$left = array_slice($left, 1);
    		}
    	}
    	while (count($left) > 0){
    		$res[] = $left[0];
    		$left = array_slice($left, 1);
    	}
    	while (count($right) > 0){
    		$res[] = $right[0];
    		$right = array_slice($right, 1);
    	}
    	return $res;
    }
    echo "-------------Merge-sort------------" . "<br>";
    echo "Unsorted Array : " . implode(',',$try_array) . "<br>";
    echo "Sorted Array : " . implode(',',merge_sort($try_array));
?>



<?php
$v_array = array(8, 3, 9, 6, 7, 5, 4);
function quick_sort($v_array)
{
    $start_index = array();
    $end_index = array();
    if (count($v_array) < 2) {
        return $v_array;
    }
    // echo $v_array;
    $pivot_index = key($v_array);
    $pivot = array_shift($v_array);
    // print_r($pivot);
    foreach ($v_array as $value) {
        if ($value <= $pivot) {
            $start_index[] = $value;
            // print_r($start_index);
        } elseif ($value > $pivot) {
            $end_index[] = $value;
            // print_r($end_index);
        }
    }
    return array_merge(quick_sort($start_index), array($pivot_index => $pivot), quick_sort($end_index));
}
echo "-------------Quick-sort------------" . "<br>";
echo 'Unsorted array : ' . implode(',', $v_array) . '<br>';
echo 'Sorted array : ' . implode(',', quick_sort($v_array));
?>
