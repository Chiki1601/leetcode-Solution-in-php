class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $flights
     * @param Integer $src
     * @param Integer $dst
     * @param Integer $k
     * @return Integer
     */
    function findCheapestPrice($n, $flights, $src, $dst, $k) {
        $d = array_fill(0, $n, PHP_INT_MAX);
        $d[$src] = 0;
        $map = [];
        foreach($flights as [$from, $to, $cost]){
            $map[$from][$to] = $cost;
        }
        $queue = [$src];
        $k++;
        do {
            $next = [];
            $k--;
            $dd = $d;
            foreach($queue as $from) {
                foreach($map[$from] as $to => $cost) {
                    if($dd[$to] > ($d[$from] + $cost)){
                        $next[]=$to;
                        $dd[$to] = $d[$from] + $cost;
                    }
                }
            }
            $d = $dd;
        } while($k && ($queue = $next));

        return ($d[$dst]<PHP_INT_MAX)?$d[$dst]:-1;
    }
}
