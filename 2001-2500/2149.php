class Solution
{

  /**
   * @param int[] $nums * @return int[] */ function rearrangeArray($nums)
  {
    foreach ($nums as $num) {
      if ($num < 0) { $neg[] = $num; continue; } $pos[] = $num; } $ans = [];
    foreach ($neg as $k => $item) { $ans[] = $pos[$k];
      $ans[] = $neg[$k]; } return $ans;
  }
}
(new Solution())->rearrangeArray($nums);
