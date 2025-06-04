class Solution {
    public function answerString(string $word, int $nf): string {
        $n = strlen($word);
        if ($nf == 1) {
            return $word;
        }

        $couldbe = '';
        $maxi = 'a';

        for ($i = 0; $i < $n; $i++) {
            if ($word[$i] >= $maxi) {
                $splits_left = ($nf - $i) >= 0 ? ($nf - $i) : 0;
                $substring_length = ($n - $splits_left + 1) - $i;
                $candidate = substr($word, $i, $substring_length);
                if (strcmp($candidate, $couldbe) > 0) {
                    $couldbe = $candidate;
                }
                $maxi = $word[$i];
            }
        }

        return $couldbe;
    }
}
