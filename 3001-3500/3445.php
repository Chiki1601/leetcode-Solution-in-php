class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function maxDifference($s, $k) {
        $getStatus = function($cnt_a, $cnt_b) {
            return (($cnt_a & 1) << 1) | ($cnt_b & 1);
        };

        $n = strlen($s);
        $ans = -INF;
        for ($a = '0'; $a <= '4'; ++$a) {
            for ($b = '0'; $b <= '4'; ++$b) {
                if ($a == $b) {
                    continue;
                }
                $best = [INF, INF, INF, INF]; 
                $cnt_a = 0;
                $cnt_b = 0;
                $prev_a = 0;
                $prev_b = 0;
                $left = -1;
                for ($right = 0; $right < $n; ++$right) {
                    $cnt_a += ($s[$right] == $a);
                    $cnt_b += ($s[$right] == $b);
                    while ($right - $left >= $k && $cnt_b - $prev_b >= 2) {
                        $left_status = $getStatus($prev_a, $prev_b);
                        $best[$left_status] =
                            min($best[$left_status], $prev_a - $prev_b);
                        ++$left;
                        $prev_a += ($s[$left] == $a);
                        $prev_b += ($s[$left] == $b);
                    }
                    $right_status = $getStatus($cnt_a, $cnt_b);
                    if ($best[$right_status ^ 0b10] != INF) {
                        $ans =
                            max($ans, $cnt_a - $cnt_b - $best[$right_status ^ 0b10]);
                    }
                }
            }
        }
        return $ans;
    }
}
