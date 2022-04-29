<?php

namespace LeetCode\ThreeSum;

require __DIR__ . '/vendor/autoload.php';

/*
 * @lc app=leetcode id=15 lang=php
 *
 * [15] 3Sum
 */

// @lc code=start
class Solution
{

    /**
     * @param int[] $nums
     * @return int[][]
     */
    public function threeSum($nums)
    {
        $answer = [];
        $length = count($nums);

        if ($length < 3) {
            return $answer;
        }

        sort($nums);
    }
}
// @lc code=end

// $Solution = new Solution();
// $answer = $Solution->threeSum([-1, 0, 1, 2, -1, -4]);
// dump($answer);
