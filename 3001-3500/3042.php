class Solution {

    /**
     * @param String[] $words
     * @return Integer
     */
    function countPrefixSuffixPairs($words) {
        $res = 0;
        foreach($words as $k => $w){
            for($i = $k+1;$i<count($words);$i++){
                $start = substr($words[$i],0,strlen($w));
                $end = substr($words[$i],strlen($words[$i])-strlen($w));
                if($start == $end && $end == $w){
                    $res++;
                }
            }
        }
        return $res;
    }
}
