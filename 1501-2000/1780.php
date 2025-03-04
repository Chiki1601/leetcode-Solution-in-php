class Solution {
    function checkPowersOfThree($n) {
        while ($n > 0) {
            if ($n % 3 == 2) {
                return false;
            }
            $n = intdiv($n, 3);
        }
        return true;
    }
}
