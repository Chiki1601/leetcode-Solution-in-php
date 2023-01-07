class Solution {

    /**
     * @param Integer[] $gas
     * @param Integer[] $cost
     * @return Integer
     */
     function canCompleteCircuit($gas, $cost)
{
    if (array_sum($cost)>array_sum($gas)) {
        return -1;
    }
    // else there must be a solution
    $n=count($gas);
    $total_gas=0;
    $total_cost=0;
    $curr_gas=0;
    $starting_point=0;
    for ($i=0;$i<$n;$i++) {
        //these two variable are to check if no case is possible
        $total_gas+=$gas[$i];
        $total_cost+=$cost[$i];
        //for checking the current index
        $curr_gas+=$gas[$i]-$cost[$i];
        if ($curr_gas<0) {
            //there is no gas....so we will start from next point or index, and set current gas to zero
            $starting_point=$i+1;
            //reset our fuel
            $curr_gas=0;
        }
    }
    return $starting_point;
}

}
