class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxAscendingSum($nums) {
    if (empty($nums)) return 0; // Edge case: empty array

    $max_sum = 0;
    $current_sum = $nums[0]; // Start with the first number

    for ($i = 1; $i < count($nums); $i++) {
        if ($nums[$i] > $nums[$i - 1]) { 
            $current_sum += $nums[$i]; // Keep adding to current sum
        } else { 
            $max_sum = max($max_sum, $current_sum); // Store the max sum
            $current_sum = $nums[$i]; // Start new sequence
        }
    }

    return max($max_sum, $current_sum); // Final check for the last sequence
}
}
