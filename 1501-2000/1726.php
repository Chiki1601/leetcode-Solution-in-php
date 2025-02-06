class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function tupleSameProduct($nums) {
        $n = count($nums);
        if ($n < 4) { return 0; }
        $tuples = [];
        $tupleCount = 0;
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i+1; $j < $n; $j++) {
                $product = $nums[$i] * $nums[$j];
                if (!isset($tuples[$product])) {
                    $tuples[$product] = [];
                }
                $tuples[$product][] = [$nums[$i], $nums[$j]];
            }
        }
        
        foreach ($tuples as $product => $pairs) {
            $kount = count($pairs);
            if ($kount > 1) { 
                for ($i = 0; $i < $kount; $i++) {
                    for ($j = $i + 1; $j < $kount; $j++) {
                        [$a, $b] = $pairs[$i];
                        [$c, $d] = $pairs[$j];
                        if ($a !== $c && $a !== $d && $b !== $c && $b !== $d) {
                            $tupleCount++;
                        }
                    }
                }
            }
        }
        return $tupleCount * 8;        
    }
}
