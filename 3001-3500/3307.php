class Solution {

    /**
     * @param Integer $k
     * @param Integer[] $operations
     * @return String
     */
    function kthCharacter($k, $operations) {
        $i = $k;
        $transforms = 0;

        while ($i > 1) {
            $n = (int) floor(log($i - 1, 2)); // log base 2
            $i -= 1 << $n; // equivalent to pow(2, $n)
            if ($operations[$n] === 1) {
                $transforms++;
            }
        }

        return chr(97 + ($transforms % 26)); // 97 = ASCII of 'a'
    }
}
