class Solution
{

    /**
     * @param String[] $words1
     * @param String[] $words2
     * @return String[]
     */
    function wordSubsets($words1, $words2)
    {

        $ans = [];
        $words2Count = [];

        foreach ($words2 as $word) {
            $wordCount = count_chars($word, 1);
            foreach ($wordCount as $wordCountKey => $wordCountValue) {
                if (!isset($words2Count[$wordCountKey]) || $words2Count[$wordCountKey] < $wordCountValue)
                    $words2Count[$wordCountKey] = $wordCountValue;
            }
        }

        foreach ($words1 as $word) {

            $wordCount = count_chars($word, 1);

            foreach ($words2Count as $char => $value) {
                if (!isset($wordCount[$char]) || $wordCount[$char] < $value) {
                    continue 2;
                }
            }

            $ans[] = $word;
        }

        return $ans;
    }
}
