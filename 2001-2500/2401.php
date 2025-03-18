class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestNiceSubarray($nums) {
        $left = 0;
        $currAND = 0;
        $maxLength = 0;
    
        for ($right = 0; $right < count($nums); $right++) {
            while (($currAND & $nums[$right]) !== 0) {
                $currAND ^= $nums[$left];
                $left++;
            }
            $currAND |= $nums[$right];    
            $maxLength = max($maxLength, $right - $left + 1);
        }
        return $maxLength;          
    }
}
