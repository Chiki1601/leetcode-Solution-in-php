class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function findKthNumber($n, $k) {
        $k -= 1;
        $cur = 1;
        while ($k > 0) {
            $step = $this->countNumbers($cur, $n);
            if ($k >= $step) {
                $k -= $step;
                $cur += 1;
            } else {
                $k -= 1;
                $cur *= 10;
            }
        }
        return $cur;
    }

    function countNumbers($cur, $n) {
        $count = 0;
        $x = $cur;
        $y = $cur + 1;
        while ($x <= $n) {
            $count += min($n + 1, $y) - $x;
            $x *= 10;
            $y *= 10;
        }
        return $count;
    }
}
