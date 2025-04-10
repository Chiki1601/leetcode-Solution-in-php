class Solution {

    private $memo = [];

    /**
     * @param Integer $start
     * @param Integer $finish
     * @param Integer $limit
     * @param String $s
     * @return Integer
     */
    public function numberOfPowerfulInt(int $start, int $finish, int $limit, string $suffix): int
    {
        if ((int)$suffix > $finish) {
            return 0;
        }
        return $this->helper($finish, $limit, $suffix) - $this->helper($start - 1, $limit, $suffix);
    }

    private function helper(int $number, int $limit, string $suffix): int
    {
        $numberString = (string)$number;
        $this->memo = array_fill(0, strlen($numberString) + 10, []);
        return $this->helper2($numberString, $limit, $suffix, 0, 0);
    }

    private function helper2(string $finish, int $limit, string $suffix, int $index, int $freeDigit): int
    {
        if (isset($this->memo[$index][$freeDigit])) {
            return $this->memo[$index][$freeDigit];
        } elseif (strlen($finish) < strlen($suffix)) {
            return 0;
        } elseif (strlen($finish) - $index === strlen($suffix)) {
            if ($freeDigit === 1) {
                return 1;
            } elseif ((int)substr($finish, $index) >= (int)$suffix) {
                return 1;
            } else {
                return 0;
            }
        }
        $res = 0;
        $currChar = (int)$finish[$index] - '0';
        $max = $freeDigit === 1 ? 9 : $currChar;
        for ($i = 0; $i <= min($max, $limit); $i++) {
            $nextFreeDigit = $freeDigit === 0 && $currChar === $i ? 0 : 1;
            $res += $this->helper2($finish, $limit, $suffix, $index + 1, $nextFreeDigit);
        }
        return $this->memo[$index][$freeDigit] = $res;
    }
}
