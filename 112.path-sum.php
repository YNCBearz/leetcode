<?php

namespace LeetCode\PathSum;

/*
 * @lc app=leetcode id=112 lang=php
 *
 * [112] Path Sum
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
     * @param TreeNode $root
     * @param Integer $targetSum
     * @return Boolean
     */
    function hasPathSum($root, $targetSum)
    {
        $total = 0;
        $total = $total + $root->val;

        if (is_null($root->val)) {
            return false;
        }

        if (
            $total == $targetSum &&
            is_null($root->right) &&
            is_null($root->left)
        ) {
            return true;
        }

        if (!is_null($root->left)) {
            $leftTotal = $this->hasPathSum($root->left, $targetSum - $total);

            if ($leftTotal) {
                return true;
            }
        }

        if (!is_null($root->right)) {
            $rightTotal = $this->hasPathSum($root->right, $targetSum - $total);

            if ($rightTotal) {
                return true;
            }
        }

        return false;
    }
}
// @lc code=end
