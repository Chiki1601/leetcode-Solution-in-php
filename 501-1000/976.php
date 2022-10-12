class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function largestPerimeter($nums) {
        sort($nums);
        while(count($nums) > 2) {
           if($nums[count($nums)-1] < $nums[count($nums)-2]+$nums[count($nums)-3]) {
               return $nums[count($nums)-1] + $nums[count($nums)-2]+$nums[count($nums)-3];
           }

            array_splice($nums, count($nums)-1, 1);
        }

        return 0;
    }
}
