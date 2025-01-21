class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function gridGame($grid) {
        $minResult = 99999999999; 
    $row1Sum = 0; 
    for ($i = 0; $i < count($grid[0]); ++$i) {
        $row1Sum += $grid[0][$i];
    }

    $row2Sum = 0; 
    for ($i = 0; $i < count($grid[0]); ++$i) {
        $row1Sum -= $grid[0][$i];
        $minResult = min($minResult, max($row1Sum, $row2Sum));
        $row2Sum += $grid[1][$i];
    }

    return $minResult;
    }
}
