class Solution {
    /**
     * @param Integer[] $days
     * @param Integer[] $costs
     * @return Integer
     */
    function mincostTickets($days, $costs) {
        $dp = array_fill(0, 366, 0); // DP array for days 0 to 365
        $dayIndex = 0; // Pointer for days array
        $n = count($days);

        // Iterate through each day of the year
        for ($i = 1; $i <= 365; $i++) {
            if ($dayIndex < $n && $days[$dayIndex] == $i) {
                // Calculate the cost for each type of ticket
                $cost1 = $dp[$i - 1] + $costs[0]; // 1-day pass
                $cost7 = $dp[max(0, $i - 7)] + $costs[1]; // 7-day pass
                $cost30 = $dp[max(0, $i - 30)] + $costs[2]; // 30-day pass
                
                // Take the minimum of the three options
                $dp[$i] = min($cost1, min($cost7, $cost30));
                
                // Move to the next travel day
                $dayIndex++;
            } else {
                // If it's not a travel day, just carry forward the previous cost
                $dp[$i] = $dp[$i - 1];
            }
        }

        // The answer is the minimum cost to cover all travel days
        return $dp[365];
    }
}
