class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minimumIndex($nums) {
        $n = count($nums);
        $candidate = null;
        $count = 0;
        $total = 0;
        $leftCount = 0;
        
        foreach ($nums as $num) {
            if ($count === 0) {
                $candidate = $num;
                $count = 1;
            } 
            elseif ($num === $candidate) { $count++; } 
            else { $count--; }
        }

        foreach ($nums as $num) {
            if ($num === $candidate) { $total++; }
        }

        for ($i = 0; $i < $n - 1; $i++) {
            if ($nums[$i] === $candidate) {
                $leftCount++;
            }
            $leftSize = $i + 1;
            $rightSize = $n - $leftSize;
            $rightCount = $total - $leftCount;

            if ($leftCount * 2 > $leftSize && $rightCount * 2 > $rightSize) {
                return $i;
            }
        }
        return -1;         
    }
}
