class Solution {
    public function smallestEquivalentString($s1, $s2, $baseStr) {
        $map = $this->createCharMapArr();
        $this->mapCharToSmallestEquivalents($map, $s1, $s2);
        $smallestEquivalent = "";
        for ($i = 0; $i < strlen($baseStr); $i++) {
            $smallestEquivalent .= $this->findMapping($baseStr[$i], $map);
        }
        return $smallestEquivalent;
    }

    private function createCharMapArr() {
        $map = array();
        $firstAsciiCode = ord('a');
        for ($i = 0; $i < 26; $i++) {
            $map[$i] = chr($firstAsciiCode);
            $firstAsciiCode++;
        }
        return $map;
    }

    private function mapCharToSmallestEquivalents(&$map, $s1, $s2) {
        for ($i = 0; $i < strlen($s1); $i++) {
            $c1 = $s1[$i];
            $c2 = $s2[$i];
            $mapForC1 = $this->findMapping($c1, $map);
            $mapForC2 = $this->findMapping($c2, $map);
            if ($mapForC1 < $mapForC2) {
                $map[ord($mapForC2) - ord('a')] = $mapForC1;
            } else {
                $map[ord($mapForC1) - ord('a')] = $mapForC2;
            }
        }
    }

    private function findMapping($sign, &$map) {
        if ($map[ord($sign) - ord('a')] != $sign) {
            $map[ord($sign) - ord('a')] = $this->findMapping($map[ord($sign) - ord('a')], $map);
        }
        return $map[ord($sign) - ord('a')];
    }
}
