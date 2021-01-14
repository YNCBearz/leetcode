<?php

namespace LeetCode\UniqueBinarySearchTrees;
/*
 * @lc app=leetcode id=96 lang=php
 *
 * [96] Unique Binary Search Trees
 */

// @lc code=start
class Solution
{
    /**
     * @var array
     */
    private $numOfAnswer = [];

    /**
     * @param int $n
     * @return int
     */
    public function numTrees($n)
    {
        /**
         * 沒有節點的情況有一種可能（空集合）
         */
        $this->numOfAnswer[0] = 1;

        /**
         * 1個節點的情況有一種可能（一個點）
         */
        $this->numOfAnswer[1] = 1;

        for ($i = 2; $i <= $n; $i++) {
            $this->count($i);
        }

        return $this->numOfAnswer[$n];
    }

    /**
     * @param int $n
     * @return void
     */
    private function count($n)
    {
        /**
         * 先取出一個節點當root
         */
        $num = $n - 1;

        /**
         * 1. 左節點的數量 + 右節點的數量 = $num
         * 2. 總和 = 左節點數量的所有可能 * 右節點數量的所有可能
         */
        $result = 0;
        for ($i = 0; $i <= $num; $i++) {
            $result = $result + $this->numOfAnswer[$i] * $this->numOfAnswer[$num - $i];
        }

        $this->numOfAnswer[$n] = $result;
    }
}
// @lc code=end
