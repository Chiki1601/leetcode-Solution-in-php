class Solution {

    /**
     * @param String[] $words
     * @return String[]
     */
    function removeAnagrams($words) {
        $l = count($words)-1;
        $p = 0;
        for($i = 0; $i < $l; $i++) {
            $z = str_split($words[$p]);
            $c = $i+1;
            $x = str_split($words[$c]);
            sort($z);
            sort($x);

            if(implode($z)===implode($x)){
                unset($words[$c]);
            } else {
                $p = $i+1;
            }
        }

        return $words;
    }
}
