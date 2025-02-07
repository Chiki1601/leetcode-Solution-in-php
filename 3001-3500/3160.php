class Solution {

    /**
     * @param Integer $limit
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function queryResults($limit, $queries) {
        $colorMap = []; // Stores the color of each ball
        $colorCount = []; // Tracks occurrences of each color
        $result = [];
    
        foreach ($queries as $query) {
            list($x, $y) = $query;
    
            // If the ball was previously colored, decrease its old color count
            if (isset($colorMap[$x])) {
                $oldColor = $colorMap[$x];
                $colorCount[$oldColor]--;
    
                // Remove color from tracking if no more balls have this color
                if ($colorCount[$oldColor] == 0) {
                    unset($colorCount[$oldColor]);
                }
            }
    
            // Update the ball's color
            $colorMap[$x] = $y;
            
            // Increase the new color's count
            if (!isset($colorCount[$y])) {
                $colorCount[$y] = 0;
            }
            $colorCount[$y]++;
    
            // Store the count of distinct colors
            $result[] = count($colorCount);
        }
    
        return $result;          
    }
}
