class Solution {

    /**
     * @param String $palindrome
     * @return String
     */
    function breakPalindrome($palindrome) {
        $results = "";
        if(strlen($palindrome) == 1)
            return $results;
        
        $length = strlen($palindrome);
        
        for($x = 0; $x <= $length / 2; ++$x)
        {
            if($palindrome[$x] != 'a')
            {
                $results = substr($palindrome, 0, $x) . 'a' . substr($palindrome, $x + 1);
                if($results != strrev($results))
                    return $results;
            }
        }
        $results = substr($palindrome, 0, $length - 1) . 'b';
        return $results;

    }
}
