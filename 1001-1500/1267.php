class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function countServers($grid) {
        $m = count($grid);        // Number of rows
        $n = count($grid[0]);     // Number of columns
        $row = array_fill(0, $m, 0); // Row counts
        $col = array_fill(0, $n, 0); // Column counts
        $cnt = 0;                 // Total servers count

        // First pass: Count servers in each row and column
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] === 1) {
                    $cnt++;
                    $row[$i]++;
                    $col[$j]++;
                }
            }
        }

        // Second pass: Remove isolated servers
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] === 1 && $row[$i] === 1 && $col[$j] === 1) {
                    $cnt--;
                }
            }
        }

        return $cnt;
    }
}
