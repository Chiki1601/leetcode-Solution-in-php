class Solution {
  /**
    * @param Integer[] $values
    * @return Integer
    */
  function maxScoreSightseeingPair($values) {
    $max = 0;
    $score = $values[0];
    $length = count($values);
    for ($i = 1; $i < $length; ++$i) {
      --$score;
      if ($score + $values[$i] > $max) $max = $score + $values[$i];
      if ($values[$i] > $score) $score = $values[$i];
    }
    return $max;
  }
}
