class Solution {

    /**
     * @param String $s
     * @param Integer[] $spaces
     * @return String
     */
    function addSpaces($s, $spaces) {
        $j = 0;
        $output = "";

        foreach (str_split($s) as $k=>$c) {
            if ($k === $spaces[$j]) {
                $output .= " ";
                $j++;
            }
            
            $output .= $c;
        }

        return $output;
    }
}
