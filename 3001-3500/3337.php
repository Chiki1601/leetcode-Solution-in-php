class Solution {

    /**
     * @param String $s
     * @param Integer $t
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthAfterTransformations($s, $t, $nums) {
        $MOD = 1000000007;
        $ALPHA = 26;
        $codeA = ord('a');

        // Initialize transformation matrix
        $base = array_fill(0, $ALPHA, array_fill(0, $ALPHA, 0));
        foreach ($nums as $i => $count) {
            for ($k = 1; $k <= $count; $k++) {
                $to = ($i + $k) % $ALPHA;
                $base[$i][$to] += 1;
            }
        }

        // Initial counts vector
        $counts = array_fill(0, $ALPHA, 0);
        $len = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            $idx = ord($s[$i]) - $codeA;
            $counts[$idx] += 1;
        }

        // Matrix multiplication
        $mulMatrix = function($A, $B) use ($MOD, $ALPHA) {
            $result = array_fill(0, $ALPHA, array_fill(0, $ALPHA, 0));
            for ($i = 0; $i < $ALPHA; $i++) {
                for ($j = 0; $j < $ALPHA; $j++) {
                    $sum = 0;
                    for ($k = 0; $k < $ALPHA; $k++) {
                        $sum = ($sum + $A[$i][$k] * $B[$k][$j]) % $MOD;
                    }
                    $result[$i][$j] = $sum;
                }
            }
            return $result;
        };

        // Multiply vector with matrix
        $mulVector = function($vec, $M) use ($MOD, $ALPHA) {
            $res = array_fill(0, $ALPHA, 0);
            for ($j = 0; $j < $ALPHA; $j++) {
                $sum = 0;
                for ($i = 0; $i < $ALPHA; $i++) {
                    $sum = ($sum + $vec[$i] * $M[$i][$j]) % $MOD;
                }
                $res[$j] = $sum;
            }
            return $res;
        };

        // Fast matrix exponentiation
        $powerMat = $base;
        while ($t > 0) {
            if ($t & 1) {
                $counts = $mulVector($counts, $powerMat);
            }
            $powerMat = $mulMatrix($powerMat, $powerMat);
            $t >>= 1;
        }

        // Sum the final vector
        $result = 0;
        foreach ($counts as $cnt) {
            $result = ($result + $cnt) % $MOD;
        }

        return $result;
    }
}
