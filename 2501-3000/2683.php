class Solution {

    /**
     * @param Integer[] $derived
     * @return Boolean
     */
    function doesValidArrayExist($derived) {
       return array_reduce($derived, function($carry, $item) {return $carry ^ $item;}, 1); 
    }
}
