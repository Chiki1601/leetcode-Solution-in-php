class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minOperations($nums) {
        $n = count($nums);
        $flips = 0;
    
        for ($i = 0; $i <= $n - 3; $i++) {
            if ($nums[$i] == 0) {
                for ($j = 0; $j < 3; $j++) {
                    $nums[$i + $j] ^= 1;
                }
                $flips++;
            }
        }
    
        foreach ($nums as $num) {
            if ($num == 0) return -1;
        }
    
        return $flips;          
    }
}
