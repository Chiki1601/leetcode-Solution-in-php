class Solution
{

    /**
     * @param Integer $N
     * @param Integer[][] $trust
     * @return Integer
     */
    function findJudge($N, $trust)
    {
        $a = array_fill(1, $N, 0);
        foreach ($trust as [$x, $y]) {
            $a[$x]++;
            $a[$y]--;
        }
        for ($i = 1; $i <= $N; $i++) if (-$N + 1 === $a[$i]) return $i;
        return -1;
    }
}
