class Solution {
    const MOD = 1000000007;

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function colorTheGrid($m, $n) {
        $MOD = self::MOD;
        $maxMask = pow(3, $m);
        $valid = [];
        $adjacent = [];

        // Generate all valid masks
        for ($mask = 0; $mask < $maxMask; ++$mask) {
            $colors = [];
            $temp = $mask;
            $validMask = true;

            for ($i = 0; $i < $m; ++$i) {
                $colors[$i] = $temp % 3;
                $temp = intdiv($temp, 3);
                if ($i > 0 && $colors[$i] == $colors[$i - 1]) {
                    $validMask = false;
                    break;
                }
            }

            if ($validMask) {
                $valid[$mask] = $colors;
            }
        }

        // Build adjacency list
        foreach ($valid as $mask1 => $colors1) {
            foreach ($valid as $mask2 => $colors2) {
                $compatible = true;
                for ($i = 0; $i < $m; ++$i) {
                    if ($colors1[$i] == $colors2[$i]) {
                        $compatible = false;
                        break;
                    }
                }
                if ($compatible) {
                    $adjacent[$mask1][] = $mask2;
                }
            }
        }

        // Initialize DP
        $dp = array_fill(0, $maxMask, 0);
        foreach (array_keys($valid) as $mask) {
            $dp[$mask] = 1;
        }

        // DP over columns
        for ($col = 1; $col < $n; ++$col) {
            $newDp = array_fill(0, $maxMask, 0);
            foreach (array_keys($valid) as $mask2) {
                if (!isset($adjacent[$mask2])) continue;
                foreach ($adjacent[$mask2] as $mask1) {
                    $newDp[$mask2] = ($newDp[$mask2] + $dp[$mask1]) % $MOD;
                }
            }
            $dp = $newDp;
        }

        // Sum all valid configurations
        $result = 0;
        foreach ($dp as $count) {
            $result = ($result + $count) % $MOD;
        }

        return $result;
    }
}
