class Solution {
    function countSubarrays($nums, $k) {
        $max = max($nums);

        $left = 0;
        $res = 0;
        $count = 0;

        foreach ($nums as $val) {
            if ($val == $max) {
                $count++;
            }

            while ($count >= $k) {
                if ($nums[$left++] == $max) {
                    $count--;
                }
            }

            $res += $left;
        }

        return $res;
    }
}
