<?php

namespace LeetCode\BinaryTreeLevelOrderTraversalII;


/*
 * @lc app=leetcode id=107 lang=php
 *
 * [107] Binary Tree Level Order Traversal II
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
    protected $answer = [];

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    public function levelOrderBottom($root)
    {
        if (is_null($root->val)) {
            return [];
        }

        $this->findAnswer($root);
        $this->reverse();
        return $this->answer;
    }

    /**
     * @param TreeNode $root
     * @param int $level
     */
    private function findAnswer($root, $level = 0)
    {
        if (is_null($root->val)) {
            return;
        }

        $this->answer[$level] = array_merge($this->answer[$level] ?? [], [$root->val]);

        if (!is_null($root->left)) {
            $this->findAnswer($root->left, $level + 1);
        }

        if (!is_null($root->right)) {
            $this->findAnswer($root->right, $level + 1);
        }
    }

    private function reverse()
    {
        $this->answer = array_reverse($this->answer);
    }
}
// @lc code=end
