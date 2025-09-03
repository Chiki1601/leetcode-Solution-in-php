class Solution {

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function numberOfPairs($points) {
        $n = count($points);
    if ($n < 2) return 0;
 
    usort($points, function ($a, $b) {
        if ($a[0] === $b[0]) return $b[1] <=> $a[1];
        return $a[0] <=> $b[0];
    });

    $ans = 0;
 
    for ($i = 0; $i < $n; $i++) {
        $yA = $points[$i][1];
        $m = PHP_INT_MIN;  

        for ($j = $i + 1; $j < $n; $j++) {
            $yB = $points[$j][1];
 
            if ($yB > $yA) { 
                continue;
            } 
            if ($m < $yB) {
                $ans++;
            } 
            if ($yB <= $yA && $yB > $m) {
                $m = $yB;
            }
        }
    }

    return $ans;
    }
}
