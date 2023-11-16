class Solution {

    /**
     * @param String[] $nums
     * @return String
     */
    function findDifferentBinaryString($nums) {
        
        $strlen = strlen($nums[0]);    
        foreach(range(0,$strlen*2+1) as $j=>$first){
            $bin = str_pad(base_convert($first, 10, 2), $strlen, '0');
            if(!in_array($bin, $nums)){
                return $bin;
            }
        }
        
        
        
    }
}
