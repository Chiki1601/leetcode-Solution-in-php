class Solution {

    /**
     * @param Integer[][] $moveTime
     * @return Integer
     */
    function minTimeToReach($moveTime) {
        $n = count($moveTime);
        $m = count($moveTime[0]);

        $best = array_fill(0, $n, array_fill(0, $m, PHP_INT_MAX));
        $best[0][0] = 0;

        $dirs = [[-1, 0], [1, 0], [0, -1], [0, 1]];

        // Min-heap (priority queue) using SplPriorityQueue (inverted priorities for min-heap)
        $pq = new SplPriorityQueue();
        $pq->setExtractFlags(SplPriorityQueue::EXTR_DATA);
        $pq->insert([0, 0, 0], 0); // [time, x, y] with priority 0 (lowest time = highest priority)

        while (!$pq->isEmpty()) {
            list($time, $x, $y) = $pq->extract();

            if ($x === $n - 1 && $y === $m - 1) {
                return $time;
            }

            foreach ($dirs as $dir) {
                $nx = $x + $dir[0];
                $ny = $y + $dir[1];

                if ($nx >= 0 && $nx < $n && $ny >= 0 && $ny < $m) {
                    $wait = max(0, $moveTime[$nx][$ny] - $time);
                    $nextTime = $time + 1 + $wait;

                    if ($nextTime < $best[$nx][$ny]) {
                        $best[$nx][$ny] = $nextTime;
                        // Use -$nextTime as priority because SplPriorityQueue is a max-heap
                        $pq->insert([$nextTime, $nx, $ny], -$nextTime);
                    }
                }
            }
        }

        return -1; // Should not reach here unless unreachable
    }
}
