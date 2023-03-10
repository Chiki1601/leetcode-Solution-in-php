class Solution
{
    private $head;

    function __construct($head)
    {
        $this->head = $head;
    }

    function getRandom()
    {
        $i = $val = 0;
        $node = $this->head;

        while ($node) {
            if (rand(1, ++$i) == $i) $val = $node->val;
            $node = $node->next;
        }

        return $val;
    }
}
