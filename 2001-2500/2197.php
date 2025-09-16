class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function replaceNonCoprimes($nums) {
        $j = 0;
        $n = count($nums);

        for ($i = 0; $i < $n; $i++, $j++) {
            $nums[$j] = $nums[$i];
            
            // keep merging leftwards while gcd > 1
            while ($j - 1 >= 0 && $this->gcd($nums[$j], $nums[$j - 1]) > 1) {
                $g = $this->gcd($nums[$j], $nums[$j - 1]);
                $nums[$j - 1] = (int)(($nums[$j] * $nums[$j - 1]) / $g); // LCM
                $j--;
            }
        }

        // resize the array to length j
        $nums = array_slice($nums, 0, $j);

        return $nums;
    }

    // Helper function for gcd
    private function gcd($a, $b) {
        while ($b != 0) {
            $tmp = $b;
            $b = $a % $b;
            $a = $tmp;
        }
        return $a;
    }
}
