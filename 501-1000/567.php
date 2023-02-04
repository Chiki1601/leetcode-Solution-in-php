class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
   function checkInclusion($s1, $s2) { //O(length of $s2)
	$p = $s1; //p is prob
	$s = $s2; //s is whole string
	$pl = strlen($p);
	$sl = strlen($s);

	$pC = $this->getCCount($p, $pl);
	$rC = $this->getCCount(str_split(substr($s, 0, $pl)), $pl);

	for ($i = 1; $i <= $sl - $pl + 1; $i++) { //sliding window
		if ($pC === $rC) {
			return true;
		}
		$pIndex = ord($s[$i - 1]) - ord('a'); //Remove count of last character
		$rC[$pIndex] -= 1;
		$iIndex = ord($s[$i - 1 + $pl]) - ord('a'); //Add count of next character
		$rC[$iIndex] += 1;
	}
	return false;
}

function getCCount($s, $l) {
	$count = array_fill(0, 26, 0);
	for ($i = 0; $i < $l; $i++) {
		$index = ord($s[$i]) - ord('a');
		$count[$index] += 1;
	}
	return $count;
}
        
    
}
