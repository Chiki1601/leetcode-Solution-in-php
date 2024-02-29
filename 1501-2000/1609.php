function isEvenOddTree($root) { $nodes = [$root]; $odd = true;
    while (count($nodes)) { echo $nodes[0]->val.'*';
        $next = []; if ($odd) {
            $val = -INF; foreach ($nodes as $node) { if ($node===null) continue;
                if (!($node->val %2) || $node->val<=$val) return false; $val = $node->val; $next[] = $node->left; $next[] = $node->right; } $nodes = $next; $odd = false;
        } else {
            $val = INF; foreach ($nodes as $node) { if ($node===null) continue;
                if ($node->val %2 || $node->val>=$val) return false; $val = $node->val; $next[] = $node->left; $next[] = $node->right; } $nodes = $next; $odd = true;
        }
    }
    return true;
}
