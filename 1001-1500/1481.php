class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer
     */
    function findLeastNumOfUniqueInts($arr, $k) {
        $count = array_count_values($arr);
        sort($count);
        $cur = $k;
        foreach ($count as $key => $item) {
            if ($cur >= $item) {
                $cur -= $item;
                $count[$key] = 0;
            } else {
                break;
            }
        }

        $res = 0;
        foreach ($count as $item) {
            if ($item > 0) {
                $res++;
            }
        }

        return $res;
    }
}
