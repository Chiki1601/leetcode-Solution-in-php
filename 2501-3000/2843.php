class Solution {

    /**
     * @param Integer $low
     * @param Integer $high
     * @return Integer
     */
    function countSymmetricIntegers($low, $high) {
        $result = 0;

        for($i = $low; $i <= $high; $i++) {
            $n = (string)$i;
            $ln = strlen($n);

            if (($ln % 2 !== 0)) {
                continue;
            }

            $left = 0;
            $right = 0;

            $l = 0;
            $r = $ln - 1;

            while($l < $r) {
                $left += $n[$l];
                $right += $n[$r];

                $l++;
                $r--;
            }
        
            $result += $left === $right? 1: 0;
        }

        return $result;
    }
}
