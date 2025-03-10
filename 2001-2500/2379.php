class Solution {

    /**
     * @param String $blocks
     * @param Integer $k
     * @return Integer
     */
    function minimumRecolors(string $blocks, int $k): int 
    {
        $len = strlen($blocks);
        $result = 0;
        for ($i = 0; $i + $k <= $len; $i++) {
            $count  = substr_count($blocks, 'B', $i, $k);
            if ($count > $result) {
                $result = $count;
            }
        }

        return $k - $result;
    }
}
