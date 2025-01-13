class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function minimumLength($s)
    {
        $chars = count_chars($s, 1);

        $count = 0;
        foreach ($chars as $char) {
            $count += $char % 2 == 0?2:1;
        }

        return $count;
    }
}
