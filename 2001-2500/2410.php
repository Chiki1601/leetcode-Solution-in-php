class Solution {

    /**
     * @param Integer[] $players
     * @param Integer[] $trainers
     * @return Integer
     */
    function matchPlayersAndTrainers($players, $trainers) {
        // Sort both players and trainers
        sort($players);
        sort($trainers);
        
        $playerIndex = 0;
        $trainerIndex = 0;
        $matches = 0;
        
        // Use two pointers to find matches
        while ($playerIndex < count($players) && $trainerIndex < count($trainers)) {
            if ($players[$playerIndex] <= $trainers[$trainerIndex]) {
                // A match is found
                $matches++;
                $playerIndex++;  // Move to the next player
                $trainerIndex++;  // Move to the next trainer
            } else {
                // Current trainer cannot train the current player, move to the next trainer
                $trainerIndex++;
            }
        }
        
        return $matches;
    }
}
