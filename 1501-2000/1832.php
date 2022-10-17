class Solution {

    /**
     * @param String $sentence
     * @return Boolean
     */
    function checkIfPangram($sentence) {
	foreach (range('a', 'z') as $l) {
		if (strpos($sentence, $l) === false) {
			return false;
		}
	}

	return true;
}
        
    
}
