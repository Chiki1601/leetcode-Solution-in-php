class Solution {

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function lcaDeepestLeaves($root) {
        return $this->dfs($root)[1];
    }
    
    private function dfs($node) {
        if ($node === null) return [0, null];

        [$leftDepth, $leftNode] = $this->dfs($node->left);
        [$rightDepth, $rightNode] = $this->dfs($node->right);

        if ($leftDepth === $rightDepth) {
            return [$leftDepth + 1, $node];
        } 
        elseif ($leftDepth > $rightDepth) {
            return [$leftDepth + 1, $leftNode];
        } 
        else {
            return [$rightDepth + 1, $rightNode];
        }
    } 
}
