class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function countPairs($nums, $k) {
      $result = 0;
      $count =count($nums);
        for($i = 0; $i < $count; $i++){
          for($j = $i+1;$j < $count ; $j++){
            if($nums[$i]==$nums[$j] && ($i * $j) % $k == 0){
              $result+=1;
            }
          }
        }
        return $result;
    }
}
