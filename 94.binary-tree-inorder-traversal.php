<?php

namespace LeetCode\BinaryTreeInorderTraversal;

/*
 * @lc app=leetcode id=94 lang=php
 *
 * [94] Binary Tree Inorder Traversal
 */

// @lc code=start
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution
{
    /**
     * @var Integer[]
     */
    protected $answer = [];

    /**
     * @var Integer[]
     */
    protected $stack = [];

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    public function inorderTraversal($root)
    {
        $this->findAnswer($root);
        return $this->answer;
    }

    /**
     * @param TreeNode $root
     */
    private function findAnswer($root)
    {
        while (count($this->stack) > 0 || !is_null($root)) {
            if (!is_null($root)) {
                $this->stack[] = $root;
                $root = $root->left;
            } else {
                $pop = array_pop($this->stack);
                $this->answer[] = $pop->val;

                if (!is_null($pop->right)) {
                    $root = $pop->right;
                }
            }
        }
    }
}
// @lc code=end
