class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function waysToSplitArray($nums) {
        $n = count($nums);
        $totalSum = array_sum($nums); // Calculate the total sum of the array
        $leftSum = 0;
        $validSplits = 0;

        // Iterate through the array to find valid splits
        for ($i = 0; $i < $n - 1; $i++) { // We only go up to n-2 because we need at least one element on the right
            $leftSum += $nums[$i];
            $rightSum = $totalSum - $leftSum;

            // Check if the current split is valid
            if ($leftSum >= $rightSum) {
                $validSplits++;
            }
        }

        return $validSplits; // Return the count of valid splits
    }
}
