class Solution {

    /**
     * @param String[] $words
     * @param Integer[] $groups
     * @return String[]
     */
    function getLongestSubsequence($words, $groups) {
        return array_values(
            array_filter($words, function($i) use ($groups) {
                return $i == 0 || $groups[$i] != $groups[$i - 1]; 
            }, ARRAY_FILTER_USE_KEY)
        );
    }
}
