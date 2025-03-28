class Solution {

    /**
     * @param Integer[][] $grid
     * @param Integer[] $queries
     * @return Integer[]
     */
    function maxPoints($grid, $queries) {
        $rows = count($grid);
        $cols = count($grid[0]);
        $DIRECTIONS = [[0,1], [1,0], [0,-1], [-1,0]];        
        $sorted_queries = [];
        foreach ($queries as $idx => $val) {
            $sorted_queries[] = [$val, $idx];
        }
        usort($sorted_queries, fn($a, $b) => $a[0] <=> $b[0]);
        $result = array_fill(0, count($queries), 0);

        $heap = new SplPriorityQueue();
        $heap->insert([0, 0], -$grid[0][0]);
        $visited = array_fill(0, $rows, array_fill(0, $cols, false));
        $visited[0][0] = true;
        $points = 0;

        foreach ($sorted_queries as [$query_val, $query_idx]) {
            while (!$heap->isEmpty()) {
                $top = $heap->top();
                $priority = -$heap->getExtractFlags();
                [$r, $c] = $heap->extract();
                $cell_val = $grid[$r][$c];
                if ($cell_val >= $query_val) {
                    $heap->insert([$r, $c], -$cell_val);
                    break;
                }
                $points++;
                foreach ($DIRECTIONS as [$dr, $dc]) {
                    $nr = $r + $dr;
                    $nc = $c + $dc;
                    if ($nr >= 0 && $nr < $rows && $nc >= 0 && $nc < $cols && !$visited[$nr][$nc]) {
                        $visited[$nr][$nc] = true;
                        $heap->insert([$nr, $nc], -$grid[$nr][$nc]);
                    }
                }
            }
            $result[$query_idx] = $points;
        }
        return $result;     
    }
}
