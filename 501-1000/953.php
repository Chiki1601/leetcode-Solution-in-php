class Solution {

    /**
     * @param String[] $words
     * @param String $order
     * @return Boolean
     */
    function isAlienSorted($words, $order) {
        $wordCount = count($words);
        $orderArr = str_split($order);
        //loop to pcik word
        for($i=0;$i<$wordCount-1;$i++){
            //loop to compare with the next word
            for($j=$i+1;$j<$wordCount;$j++){
                $strt = 0;
                $cnt1 = strlen($words[$i]);
                $cnt2 = strlen($words[$j]);
                while($strt < $cnt1 || $strt<$cnt2){
                    if($words[$i][$strt] != $words[$j][$strt]){
                      if(array_search($words[$i][$strt],$orderArr) > array_search($words[$j][$strt],$orderArr) || $words[$j][$strt]=="")
                            return false;
                      else
                            break;
                    }
                    $strt++;
                }
            }
        }
        return true;
     
        
        
   
        
        
    }
}
