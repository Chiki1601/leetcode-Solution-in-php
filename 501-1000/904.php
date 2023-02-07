class Solution {

	/**
	 * @param Integer[] $tree * @return Integer */ function totalFruit($tree) {
		$i = 0; $baskets = $fruits = []; while($i<count($tree)){ $fruits[$tree[$i]][] = $i; if(count($fruits)>2){
				array_pop($fruits); end($fruits);
				$i = min($fruits[key($fruits)]); $baskets[] = $fruits; $fruits = [];
			}else{
				$i++; } } $baskets[] = $fruits; array_walk($baskets, function(&$basket){ array_walk($basket, function(&$fruits){ $fruits = count($fruits); }); $basket = array_sum($basket); }); return max($baskets);
	}
}
