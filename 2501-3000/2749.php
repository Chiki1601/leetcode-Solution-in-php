class Solution {

    /**
     * @param Integer $num1
     * @param Integer $num2
     * @return Integer
     */
    function makeTheIntegerZero($num1, $num2) {
        for ($t = 0; $t <= 60; $t++) {
            $s = $num1 - $t * $num2;
            if ($s < 0) {
                continue;
            }
            if ($s < $t) {
                continue;
            }

            $ones = $this->bitCount($s);
            if ($ones <= $t) {
                return $t;
            }
        }
        return -1;
    }

    private function bitCount($n) {
        $count = 0;
        while ($n > 0) {
            $n &= ($n - 1);
            $count++;
        }
        return $count;
    }
}
