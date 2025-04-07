class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canPartition($nums) {
        $arraySum = array_sum($nums);
        if ($arraySum % 2 !== 0) { return false; }
        $target = $arraySum / 2;
        $dp = array_fill(0, $target + 1, false);
        $dp[0] = true;

        foreach ($nums as $num) {
            for ($i = $target; $i >= $num; $i--) {
                $dp[$i] = $dp[$i] || $dp[$i - $num];
            }
        }

        return $dp[$target];        
    }
}
