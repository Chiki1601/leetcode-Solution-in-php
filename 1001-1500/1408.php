class Solution {

    /**
     * @param String[] $words
     * @return String[]
     */
  function stringMatching($words) {
        $result = [];
        for ($i = 0; $i < count($words); $i++) {
            for ($j = 0; $j < count($words); $j++) {
                if (strlen($words[$j]) > strlen($words[$i])) {
                    if (strpos($words[$j], $words[$i]) !== false) {
                        if (!in_array($words[$i], $result)) {
                            array_push($result, $words[$i]);
                        }
                    }
                }
            }
        }
        return $result;
    }
}
