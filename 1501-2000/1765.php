class Solution {

    /**
     * @param Integer[][] $isWater
     * @return Integer[][]
     */
    function highestPeak($isWater) {
        $m = count($isWater);
        $n = count($isWater[0]);
        $height = array_fill(0, $m, array_fill(0, $n, -1));
        $queue = new SplQueue();

        // Add all water cells to the queue and set their height to 0
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($isWater[$i][$j] === 1) {
                    $queue->enqueue([$i, $j]);
                    $height[$i][$j] = 0;
                }
            }
        }

        // Directions for neighbors (north, south, east, west)
        $directions = [[-1, 0], [1, 0], [0, -1], [0, 1]];

        // BFS
        while (!$queue->isEmpty()) {
            [$x, $y] = $queue->dequeue();

            foreach ($directions as [$dx, $dy]) {
                $nx = $x + $dx;
                $ny = $y + $dy;

                // Check if the neighbor is within bounds and unvisited
                if ($nx >= 0 && $nx < $m && $ny >= 0 && $ny < $n && $height[$nx][$ny] === -1) {
                    $height[$nx][$ny] = $height[$x][$y] + 1;
                    $queue->enqueue([$nx, $ny]);
                }
            }
        }

        return $height;
    }
}
