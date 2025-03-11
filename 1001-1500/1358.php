class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function numberOfSubstrings($s) {
        $l = strlen($s);
        // Array to store the last occurrence indices of 'a', 'b', and 'c'
        $lastIndices = [-1, -1, -1];
        // Counter for the total number of valid substrings
        $totalCount = 0;

        for ($i = 0; $i < $l; $i++) {
            $currentChar = $s[$i];
            // Update the last occurrence index of the current character
            $lastIndices[ord($currentChar) - ord('a')] = $i;
            // Calculate the minimum index of the last occurrences of 'a', 'b', and 'c'
            // This gives us the starting point for valid substrings
            $totalCount += 1 + min($lastIndices);
        }
        
        return $totalCount;
    }
}
