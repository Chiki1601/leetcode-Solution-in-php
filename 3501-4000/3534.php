class Solution {

    /**
     * @param Integer $n
     * @param Integer[] $nums
     * @param Integer $maxDiff
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function pathExistenceQueries($n, $nums, $maxDiff, $queries) {
        // Step 1: Sort indices based on nums values
        $sortedIndices = range(0, $n - 1);
        usort($sortedIndices, function($a, $b) use ($nums) {
            return $nums[$a] <=> $nums[$b];
        });

        // Step 2: Initialize position and values arrays
        $position = array_fill(0, $n, 0);
        $values = array_fill(0, $n, 0);
        foreach ($sortedIndices as $idx => $i) {
            $position[$i] = $idx;
            $values[$idx] = $nums[$i];
        }

        // Step 3: Compute reachable indices
        $reachableIndex = array_fill(0, $n, 0);
        $j = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($j < $i) {
                $j = $i;
            }
            while ($j + 1 < $n && $values[$j + 1] - $values[$i] <= $maxDiff) {
                $j++;
            }
            $reachableIndex[$i] = $j;
        }

        // Step 4: Prepare the upTable for binary lifting
        $maxLog = 1;
        while ((1 << $maxLog) < $n) {
            $maxLog++;
        }

        $upTable = array_fill(0, $maxLog, array_fill(0, $n, 0));
        $upTable[0] = $reachableIndex;

        for ($k = 1; $k < $maxLog; $k++) {
            for ($i = 0; $i < $n; $i++) {
                $upTable[$k][$i] = $upTable[$k - 1][$upTable[$k - 1][$i]];
            }
        }

        // Step 5: Process each query
        $result = [];
        foreach ($queries as $query) {
            list($start, $finish) = $query;
            if ($start === $finish) {
                $result[] = 0;
                continue;
            }

            $startPos = $position[$start];
            $endPos = $position[$finish];
            if ($startPos > $endPos) {
                list($startPos, $endPos) = [$endPos, $startPos];
            }

            if (abs($nums[$start] - $nums[$finish]) <= $maxDiff) {
                $result[] = 1;
                continue;
            }

            if ($reachableIndex[$startPos] < $endPos) {
                $current = $startPos;
                $jumpCount = 0;
                for ($k = $maxLog - 1; $k >= 0; $k--) {
                    if ($upTable[$k][$current] < $endPos) {
                        if ($upTable[$k][$current] === $current) {
                            $jumpCount = -1;
                            break;
                        }
                        $current = $upTable[$k][$current];
                        $jumpCount += (1 << $k);
                    }
                }
                if ($reachableIndex[$current] >= $endPos) {
                    $result[] = $jumpCount + 1;
                } else {
                    $result[] = -1;
                }
            } else {
                $result[] = 1;
            }
        }

        return $result;
    }
}
