class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(&$nums) {
		$low = 0;
		$mid = 0;
		$high = count($nums) - 1;
	
		while ($mid <= $high) {
			if ($nums[$mid] == 0) { 
				// Swap nums[low] and nums[mid], move both pointers
				list($nums[$low], $nums[$mid]) = array($nums[$mid], $nums[$low]);
				$low++;
				$mid++;
			} 
			elseif ($nums[$mid] == 1) { 
				// Keep 1s in place, just move mid pointer
				$mid++;
			} 
			else { 
				// Swap nums[mid] and nums[high], move high pointer
				list($nums[$mid], $nums[$high]) = array($nums[$high], $nums[$mid]);
				$high--;
			}
		}          
    }
}
