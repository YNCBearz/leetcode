<?php

namespace LeetCode\SymmetricTree;

/*
 * @lc app=leetcode id=101 lang=php
 *
 * [101] Symmetric Tree
 */

// @lc code=start
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution
{
    /**
     * @var array
     */
    protected $stack = [];

    /**
     * @param TreeNode $root
     * @return bool
     */
    public function isSymmetric($root)
    {
        if (is_null($root->val)) {
            return true;
        }

        $this->stack[] = [$root->left, $root->right];

        while (count($this->stack) > 0) {
            $pop = array_pop($this->stack);
            $left = $pop[0];
            $right = $pop[1];

            if (is_null($left) && is_null($right)) {
                continue;
            }

            if (is_null($left) || is_null($right)) {
                return false;
            }

            if ($left->val == $right->val) {
                $this->stack[] = [$left->left, $right->right];
                $this->stack[] = [$left->right, $right->left];
            } else {
                return false;
            }
        }

        return true;
    }
}
// @lc code=end
