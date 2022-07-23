<?php
$numbers = array(8, 3, 9, 6, 7, 5, 4);
// $numbers = array(-5,-4,-100,-1000);
function quickSort($numbers)
{
    $start_index = array();
    $end_index = array();
    if (count($numbers) < 2) {
        return $numbers;
    }
    // echo $numbers;
    $pivot_index = key($numbers);
    // print_r("pivotIndex".$pivot_index);
    $pivot = array_shift($numbers);
    // print_r($pivot);
    foreach ($numbers as $value) {
        if ($value <= $pivot) {
            $start_index[] = $value;
            // print_r($start_index);
        } elseif ($value > $pivot) {
            $end_index[] = $value;
            // print_r($end_index);
        }
    }
    return array_merge(quickSort($start_index), array($pivot_index => $pivot), quickSort($end_index));
}

echo "-------------Quick-sort------------" . "<br>";
echo 'Unsorted array : ' . implode(',', $numbers) . '<br>';
echo 'Sorted array : ' . implode(',', quickSort($numbers));
?>
