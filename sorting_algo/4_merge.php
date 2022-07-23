<?php
$numbers = array(8, 3, 9, 6, 7, 5, 4);


function merge_sort($numbers){
    	if(count($numbers) == 1 ) 
            return $numbers;
    	$mid = count($numbers) / 2;
        $left = array_slice($numbers, 0, $mid);
        $right = array_slice($numbers, $mid);
    	$left = merge_sort($left);
    	$right = merge_sort($right);
    	    return merge($left, $right);
    }
    function merge($left, $right){
    	$sorted_array = array();
    	while (count($left) > 0 && count($right) > 0){
    		if($left[0] > $right[0]){
    			$sorted_array[] = $right[0];
    			$right = array_slice($right , 1);
    		}else{
    			$sorted_array[] = $left[0];
    			$left = array_slice($left, 1);
    		}
    	}
    	while (count($left) > 0){
    		$sorted_array[] = $left[0];
    		$left = array_slice($left, 1);
    	}
    	while (count($right) > 0){
    		$sorted_array[] = $right[0];
    		$right = array_slice($right, 1);
    	}
    	return $sorted_array;
    }
    echo "-------------Merge-sort------------" . "<br>";
    echo "Unsorted Array : " . implode(',',$numbers) . "<br>";
    echo "Sorted Array : " . implode(',',merge_sort($numbers));

	// Time Complexity: O(n logn)
	// Auxiliary Space: O(n)
?>
