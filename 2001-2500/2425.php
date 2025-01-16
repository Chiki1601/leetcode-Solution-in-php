class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
    function xorAllNums($nums1, $nums2) {
        $c1 = count($nums1);
        $c2 = count($nums2);
        $x1 = 0;
        $x2 = 0;

        // If the length of nums1 is odd, XOR all elements of nums2
        if ($c1 % 2 !== 0) {
            foreach ($nums2 as $num) {
                $x2 ^= $num;
            }
        }

        // If the length of nums2 is odd, XOR all elements of nums1
        if ($c2 % 2 !== 0) {
            foreach ($nums1 as $num) {
                $x1 ^= $num;
            }
        }

        // Return the XOR of x1 and x2
        return $x1 ^ $x2;
    }
}
