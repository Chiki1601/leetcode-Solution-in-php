class Solution {

    /**
     * @param Integer $eventTime
     * @param Integer $k
     * @param Integer[] $startTime
     * @param Integer[] $endTime
     * @return Integer
     */
    function maxFreeTime($eventTime, $k, $startTime, $endTime) {
      $n = count($startTime);
                $gaps = array_fill(0, $n + 1, 0);

                $gaps[0] = $startTime[0];  // Free time before the first meeting
                $gaps[$n] = $eventTime - $endTime[$n - 1];  // Free time after the last meeting

                // Compute gaps between meetings
                for ($i = 1; $i < $n; $i++) {
                    $gaps[$i] = $startTime[$i] - $endTime[$i - 1];
                }

                // Compute prefix sum for efficient range sum calculation
                $pref = array_fill(0, $n + 2, 0);
                for ($i = 1; $i <= $n + 1; $i++) {
                    $pref[$i] = $pref[$i - 1] + $gaps[$i - 1];
                }

                $ans = 0;
                for ($i = $k + 1; $i <= $n + 1; $i++) {
                    $ans = max($ans, $pref[$i] - $pref[$i - ($k + 1)]);
                }

                return $ans;
            }
}
