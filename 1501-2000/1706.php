class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer[]
     */
   function findBall($grid) {
	$x = [];
	foreach($grid[0] as $key => $value){
		$x[$key] = $key;
	}
	for($i=0;$i<count($grid);$i++){
		for($j=0;$j<count($grid[0]);$j++){
			// $grid[$i][$x[$j]] > 0 的時候 $j跟$j+1 相同才會往下
			// $grid[$i][$x[$j]] < 0 的時候 $j跟$j-1 相同才會往下
			if( $x[$j] >=0){
				if($grid[$i][$x[$j]]>0){
					if($grid[$i][$x[$j]] == $grid[$i][$x[$j]+1]){
						$x[$j] += 1;
					}else{
						$x[$j] = -1;
					}
				}else{
					if($grid[$i][$x[$j]] == $grid[$i][$x[$j]-1]){
						$x[$j] -= 1;
					}else{
						$x[$j] = -1;
					}
				}
			}
		}
	}
	return $x;
}
}
