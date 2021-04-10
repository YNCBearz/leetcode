<?php

namespace LeetCode\SameTree;

/*
 * @lc app=leetcode id=100 lang=php
 *
 * [100] Same Tree
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
     * @var bool $answer
     */
    protected $answer = true;
    /**
     * @param TreeNode $p
     * @param TreeNode $q
     * @return bool
     */
    public function isSameTree($p, $q)
    {
        $this->findAnswer($p, $q);
        return $this->answer;
    }

    /**
     * @param TreeNode $p
     * @param TreeNode $q
     */
    private function findAnswer($p, $q)
    {
        if ($p->val !== $q->val) {
            return $this->answer = false;
        }

        if (($p->left->val !== $q->left->val) || ($p->right->val !== $q->right->val)) {
            return $this->answer = false;
        }

        if (!is_null($p->left) && !is_null($q->left)) {
            $this->findAnswer($p->left, $q->left);
        }

        if (!is_null($p->right) && !is_null($q->right)) {
            $this->findAnswer($p->right, $q->right);
        }
    }
}
// @lc code=end
