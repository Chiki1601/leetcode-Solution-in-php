class SegTree {
    private $n;
    private $seg;

    public function __construct($baskets) {
        $this->n = count($baskets);
        $size = 2 << (int)(log($this->n - 1, 2) + 1);
        $this->seg = array_fill(0, $size, 0);
        $this->build($baskets, 1, 0, $this->n - 1);
    }

    private function maintain($o) {
        $this->seg[$o] = max($this->seg[$o * 2], $this->seg[$o * 2 + 1]);
    }

    private function build($a, $o, $l, $r) {
        if ($l == $r) {
            $this->seg[$o] = $a[$l];
            return;
        }
        $m = intdiv($l + $r, 2);
        $this->build($a, $o * 2, $l, $m);
        $this->build($a, $o * 2 + 1, $m + 1, $r);
        $this->maintain($o);
    }

    public function findFirstAndUpdate($o, $l, $r, $x) {
        if ($this->seg[$o] < $x) {
            return -1;
        }
        if ($l == $r) {
            $this->seg[$o] = -1;
            return $l;
        }
        $m = intdiv($l + $r, 2);
        $i = $this->findFirstAndUpdate($o * 2, $l, $m, $x);
        if ($i == -1) {
            $i = $this->findFirstAndUpdate($o * 2 + 1, $m + 1, $r, $x);
        }
        $this->maintain($o);
        return $i;
    }
}

class Solution {
    /**
     * @param Integer[] $fruits
     * @param Integer[] $baskets
     * @return Integer
     */
    function numOfUnplacedFruits($fruits, $baskets) {
        $m = count($baskets);
        if ($m == 0) {
            return count($fruits);
        }

        $tree = new SegTree($baskets);
        $count = 0;

        foreach ($fruits as $fruit) {
            if ($tree->findFirstAndUpdate(1, 0, $m - 1, $fruit) == -1) {
                $count++;
            }
        }

        return $count;
    }
}
