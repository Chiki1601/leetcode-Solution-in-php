class Solution {
    function prefixCount($words, $pref) {
        $cnt = 0;
        foreach($words as $word){
            if (str_starts_with($word,$pref)){$cnt++;}
        }
        return $cnt;
    }
}
