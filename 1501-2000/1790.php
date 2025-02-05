class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function areAlmostEqual($s1, $s2) {
        $a1 = str_split($s1);
        $a2 = str_split($s2);

        if (count($a1) != count($a2)) return false;
        $count = 0;
        $r1 = [];
        $r2 = [];
        foreach ($a1 as $key => $val1) {
            if ($a1[$key] != $a2[$key]) {
                $count++;
                $r1[] = $a1[$key];
                $r2[] = $a2[$key];
            }
        }

        if ($count == 0) return true;

        if ($count != 2) return false;

        if ($r1[0] == $r2[1] && $r1[1] == $r2[0]) return true;

        return false;
    }
}
