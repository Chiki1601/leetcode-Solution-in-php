class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function jump($nums) {
        //base case
        if(count($nums) < 2) {
            return 0;
        }
        $next = 0;
        $current = 0;
        $steps = 0;
        for($i=0;$i<count($nums);++$i) {
            $current = max($current,$i+$nums[$i]);
            if ($current >= count($nums)-1) {
                return $steps+1;
            }
            if($i === $next) {
                $next = $current;
                $steps++;
            }
        }
        return 0;
    }
}```
