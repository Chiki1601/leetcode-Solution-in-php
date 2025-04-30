class Solution
{

    /**
     * @param int[] $nums * @return int */ function findNumbers($nums)
    {
        $ans = 0; foreach ($nums as $num) { if (strlen($num) % 2 === 0) $ans++; } return $ans;
    }
}
