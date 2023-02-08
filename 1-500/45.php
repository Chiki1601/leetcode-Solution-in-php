class Solution {

    function jump(array $nums): int {
        if (count($nums) === 1) {
            return 0;
        }
        return $this->bestJump(0, $nums, 1);
    }

    function bestJump(int $position, array &$nums, int $step): int {
        if ($nums[$position] + $position + 2 > count($nums)) {
            return $step;
        }

        $bestJumpPoint = $position;
        for ($i = $position + 1; $i <= $position + $nums[$position]; $i++) {
            if ($nums[$i] + $i > $nums[$bestJumpPoint] + $bestJumpPoint) {
                $bestJumpPoint = $i;
            }
        }
        
        return $this->bestJump($bestJumpPoint, $nums, $step + 1);
    }
}
