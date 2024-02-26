class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function isPossibleToSplit($nums) {
        $d = [];
        foreach($nums as $v){
            $d[$v]++;
            if($d[$v] > 2) return false;
        }
        return true;
    }
}
