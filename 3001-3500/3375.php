class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function minOperations($nums, $k) {
        $res = [];

        foreach ($nums as $value) {
            // If any number is < than k, it's impossible to make all elements = to k
            if ($value < $k) {
                return -1;
            }

            // If the number is not = to k, add it to the set of unique values
            if ($value !== $k) {
                $res[$value] = true;
            }
        }

        return count($res);
    }
}
