class Solution
{
    /**
     * @var bool[]
     */
    private array $cache = [];

    /**
     * @param int[][] $graph
     * @return int[]
     */
    function eventualSafeNodes(array $graph): array
    {
        $res = [];
        for ($i = 0; $i < count($graph); $i++) {
            if ($this->isSafe($graph, $i)) {
                $res[] = $i;
            }
        }
        return $res;
    }


    /**
     * @param int[][] $graph
     */
    function isSafe(array $graph, int $i): bool
    {
        if (isset($this->cache[$i])) {
            return $this->cache[$i];
        }
        $isSafe = true;
        $this->cache[$i] = false;
        foreach ($graph[$i] as $next) {
            $isSafe = $isSafe && $this->isSafe($graph, $next);
        }

        return $this->cache[$i] = $isSafe;
    }
}
