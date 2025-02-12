class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumSum($nums) {
        foreach($nums as $num){ 
            $digitSum = $this->sumDigit($num); 
            if(isset($map[$digitSum]) &&  count($map[$digitSum]) > 1){
                $minIdx= $map[$digitSum][0] > $map[$digitSum][1] ? 1:0;
                if($map[$digitSum][$minIdx] < $num){ 
                    $map[$digitSum][$minIdx] = $num; 
                }
            }else{ 
                $map[$digitSum][] = $num;
            }
        }   
        $res = -1; 
        foreach($map as $val){ 
            if(count($val) <= 1)continue;
            if($res < $val[0]+$val[1]){
                $res = $val[0]+$val[1];
            }
        }
        return $res;
        
    }
    function sumDigit(string $num){
        $sum = 0; 
        for($i = 0;$i < strlen($num);$i++){ 
            $sum+=$num[$i]; 
        }
        return $sum; 
    }
}
