<?php

namespace LeetCode\UniqueBinarySearchTreesII;

// require __DIR__ . '/vendor/autoload.php';

// $solution = new Solution();
// dump($solution->generateTrees(3));

/*
 * @lc app=leetcode id=95 lang=php
 *
 * [95] Unique Binary Search Trees II
 */

// @lc code=start

/**
 * Definition for a binary tree node.
 */
// class TreeNode
// {
//     public $val = null;
//     public $left = null;
//     public $right = null;
//     function __construct($val = 0, $left = null, $right = null)
//     {
//         $this->val = $val;
//         $this->left = $left;
//         $this->right = $right;
//     }
// }

class Solution
{
    /**
     * @param int $n
     * @return TreeNode[]
     */
    public function generateTrees($n)
    {
        $numbers = range(1, $n);
        return $this->generateTreesByNumbers($numbers);
    }

    /**
     * @param int[] $originalNumbers
     * @return array
     */
    private function generateTreesByNumbers($originalNumbers)
    {
        if (count($originalNumbers) == 0) {
            return [null];
        }

        if (count($originalNumbers) == 1) {
            return [new TreeNode(array_pop($originalNumbers))];
        }

        $result = [];
        //[1,2,3] => (1, [2,3]) (2, [1,3]) (3, [1,2])
        foreach ($originalNumbers as $key => $val) {
            $currentNumbers = $originalNumbers;
            unset($currentNumbers[$key]);
            $otherNumbers = $currentNumbers;

            $result = array_merge($result, $this->binarySearch($val, $otherNumbers));
        }

        return $result;
    }

    /**
     * @param int $val
     * @param int[] $otherNumbers
     * @return TreeNode[]
     */
    private function binarySearch($val, $otherNumbers)
    {
        $smallerNumbers = array_filter($otherNumbers, function ($otherNumber) use ($val) {
            return $otherNumber < $val;
        });

        $biggerNumbers = array_filter($otherNumbers, function ($otherNumber) use ($val) {
            return $otherNumber > $val;
        });

        $smallerTrees = $this->generateTreesByNumbers($smallerNumbers);
        $biggerTrees = $this->generateTreesByNumbers($biggerNumbers);

        $trees = [];
        foreach ($smallerTrees as $aSmallerTree) {
            foreach ($biggerTrees as $aBiggerTree) {
                $tree = new TreeNode($val, $aSmallerTree, $aBiggerTree);
                $trees[] = $tree;
            }
        }

        return $trees;
    }
}
// @lc code=end
