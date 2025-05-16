<?php

class Solution {
    /**
     * Checks if two strings differ by exactly one character.
     *
     * @param string $s1
     * @param string $s2
     * @return bool
     */
    private function check($s1, $s2) {
        if (strlen($s1) != strlen($s2)) {
            return false;
        }
        $diff = 0;
        for ($i = 0; isset($s1[$i]); $i++) {
            if ($s1[$i] != $s2[$i]) {
                if (++$diff > 1) {
                    return false;
                }
            }
        }
        return $diff == 1;
    }

    /**
     * Finds the longest subsequence of words where each consecutive pair differs by one character,
     * and consecutive words are from different groups.
     *
     * @param String[] $words
     * @param Integer[] $groups
     * @return String[]
     */
    public function getWordsInLongestSubsequence($words, $groups) {
        $wordsSize = count($words);
        if ($wordsSize == 0) {
            return [];
        }

        $dp = array_fill(0, $wordsSize, 1);
        $prev = array_fill(0, $wordsSize, -1);

        $maxIndex = 0;

        for ($i = 1; $i < $wordsSize; $i++) {
            for ($j = 0; $j < $i; $j++) {
                if ($this->check($words[$i], $words[$j]) && $dp[$j] + 1 > $dp[$i] && $groups[$i] != $groups[$j]) {
                    $dp[$i] = $dp[$j] + 1;
                    $prev[$i] = $j;
                }
            }
            if ($dp[$i] > $dp[$maxIndex]) {
                $maxIndex = $i;
            }
        }

        // Reconstruct the longest subsequence
        $count = 0;
        for ($i = $maxIndex; $i >= 0; $i = $prev[$i]) {
            $count++;
        }

        $ans = array_fill(0, $count, null);
        $index = 0;
        for ($i = $maxIndex; $i >= 0; $i = $prev[$i]) {
            $ans[$index++] = $words[$i];
        }

        // Reverse to get correct order
        for ($i = 0; $i < intdiv($count, 2); $i++) {
            $temp = $ans[$i];
            $ans[$i] = $ans[$count - 1 - $i];
            $ans[$count - 1 - $i] = $temp;
        }

        return $ans;
    }
}
?>
