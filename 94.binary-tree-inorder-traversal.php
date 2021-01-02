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
    protected $stack;

    /**
     * @var Integer[]
     */
    protected $answer;

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
        $this->stack[] = $root->val;

        if (!is_null($root->left)) {
            $this->findAnswer($root->left);
        }

        $this->answer[] = array_pop($this->stack);

        if (!is_null($root->right)) {
            $this->findAnswer($root->right);
        }
    }
}
// @lc code=end

//     4
//    / \
//   2   6
//  / \ / \
// 1  3 5  7

//pre-, in-, post-是指parent node相對於child node的順序

//Preorder （根、左子樹、右子樹）-> 4213657
//Inorder （左子樹、根、右子樹）-> 1234567
//Postorder （左子樹、右子樹、根）-> 1325764
