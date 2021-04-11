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
     * @var bool
     */
    protected $answer = true;

    /**
     * @param TreeNode $root
     * @return bool
     */
    public function isSymmetric($root)
    {
        if (is_null($root->val)) {
            return true;
        }

        if (is_null($root->left) && is_null($root->right)) {
            return true;
        }

        $this->checkSysmmetric($root->left, $root->right);
        return $this->answer;
    }

    /**
     * @param TreeNode $leftTree
     * @param TreeNode $rightTree
     */
    private function checkSysmmetric($leftTree, $rightTree)
    {
        if ($leftTree->val !== $rightTree->val) {
            return $this->answer = false;
        }

        if (
            $leftTree->left instanceof TreeNode &&
            $rightTree->right instanceof TreeNode
        ) {
            $this->checkSysmmetric($leftTree->left, $rightTree->right);
        }

        if (
            $leftTree->right instanceof TreeNode &&
            $rightTree->left instanceof TreeNode
        ) {
            $this->checkSysmmetric($leftTree->right, $rightTree->left);
        }

        if (is_null($leftTree->left) && !is_null($rightTree->right)) {
            return $this->answer = false;
        }

        if (!is_null($leftTree->left) && is_null($rightTree->right)) {
            return $this->answer = false;
        }

        if (is_null($leftTree->right) && !is_null($rightTree->left)) {
            return $this->answer = false;
        }

        if (!is_null($leftTree->right) && is_null($rightTree->left)) {
            return $this->answer = false;
        }
    }
}
// @lc code=end
