class Solution
{

    /**
     * @param Integer[] $arr
     * @param Integer[][] $mat
     * @return Integer
     */
    function firstCompleteIndex($arr, $mat)
    {

        $map = [];

        foreach ($mat as $key => $value) {
            foreach ($value as $k => $v) {
                $map[$v] = [$key, $k];
            }
        }

        $rows = count($mat);
        $columns = count($mat[0]);

        $testingRows = array_fill(0, $rows, 0);
        $testingColumns = array_fill(0, $columns, 0);

        foreach ($arr as $key => $value) {

            $test = $map[$value];

            if (++$testingRows[$test[0]] == $columns) {
                return $key;
            }

            if (++$testingColumns[$test[1]] == $rows) {
                return $key;
            }

        }

        return -1;
    }
}
