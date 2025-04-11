function countSymmetricIntegers($low, $high) {
    $cnt = 0;
    for ($i = $low; $i <= $high; $i++) {
        $s = strval($i);
        $n = strlen($s);
        if ($n % 2 == 0) {
            $sum1 = array_sum(str_split(substr($s, 0, $n / 2)));
            $sum2 = array_sum(str_split(substr($s, $n / 2)));
            if ($sum1 == $sum2) $cnt++;
        }
    }
    return $cnt;
}
