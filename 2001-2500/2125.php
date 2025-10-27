class Solution {

    /**
     * @param String[] $bank
     * @return Integer
     */
    function numberOfBeams($bank) {
        $total = 0;
        $prevCount = 0;
        for($i = 0; $i < count($bank); $i++){
            $currentCount = substr_count($bank[$i], '1'); //count of '1's in the current row
            if($currentCount == 0){ //if there is no '1' pass
                continue;
            }
            $total += $currentCount * $prevCount;
            $prevCount = $currentCount; // this assignment prevent the second loop
        }
        return $total;
    }
}
