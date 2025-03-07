class Solution {

    /**
     * @param Integer $left
     * @param Integer $right
     * @return Integer[]
     */
    function closestPrimes($left, $right) {
        if ($right - $left < 1) { return [-1, -1]; }
        $isPrime = array_fill(0, $right + 1, true);
        $isPrime[0] = false;
        $isPrime[1] = false;
        $primes = [];
        
        for ($i = 2; $i * $i <= $right; $i++) {
            if ($isPrime[$i]) {
                for ($j = $i * $i; $j <= $right; $j += $i) {
                    $isPrime[$j] = false;
                }
            }
        }
        for ($i = max(2, $left); $i <= $right; $i++) {
            if ($isPrime[$i]) {
                $primes[] = $i;
            }
        }
        $n = count($primes);
        if ($n < 2) { return [-1, -1]; }
        $minGap = PHP_INT_MAX;
        $closestPair = [-1, -1];
        for ($i = 1; $i < count($primes); $i++) {
            $gap = $primes[$i] - $primes[$i - 1];
            if ($gap < $minGap) {
                $minGap = $gap;
                $closestPair = [$primes[$i - 1], $primes[$i]];
            }
        }
        return $closestPair;        
    }
}
