class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $n
     * @return Integer[]
     */
    function shuffle($nums, $n) {
        (int)$i = 0;
        (int)$j = $n;
        $res = [];
        while ($j < count($nums)) {
            array_push($res, $nums[$i]);
            array_push($res, $nums[$j]);
            (int)$i++;
            (int)$j++;
        }
        return $res;
    }
}
