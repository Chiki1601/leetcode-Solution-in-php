class Solution
{

  /**
   * @param Integer[] $nums * @return Integer */ public function missingNumber($nums)
    {
        $full_range = range(0, count($nums));
        return array_values(array_diff($full_range, $nums))[0];
    }
}
