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
    protected $answers = [];

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    public function inorderTraversal($root)
    {
        $this->findAnswer($root);
        return $this->answers;
    }


    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    private function findAnswer($root)
    {
        //先把左子樹找完
        if (!is_null($root->left)) {
            $left_results = $this->findAnswer($root->left);
        }

        //沒有左子樹後，填入根（自己）
        $this->answers[] = $root->val;

        //再找右子樹
        if (!is_null($root->right)) {
            $right_results = $this->findAnswer($root->right);
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
