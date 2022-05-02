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

        for ($i = 0; $i < $length - 2; $i++) {
            if ($i != 0 && $nums[$i - 1] == $nums[$i]) {
                continue;
            }

            $windowLeft = $i + 1;
            $windowRight = $length - 1;

            while ($windowLeft < $windowRight) {
                if ($nums[$i] + $nums[$windowLeft] + $nums[$windowRight] == 0) {
                    $answer[] = [$nums[$i], $nums[$windowLeft], $nums[$windowRight]];

                    $windowLeft++;
                    while (
                        $windowLeft < $windowRight &&
                        $nums[$windowLeft - 1] == $nums[$windowLeft]
                    ) {
                        $windowLeft++;
                    }

                    $windowRight--;
                    while (
                        $windowLeft < $windowRight &&
                        $nums[$windowRight + 1] == $nums[$windowRight]
                    ) {
                        $windowRight--;
                    }
                }

                if ($nums[$i] + $nums[$windowLeft] + $nums[$windowRight] < 0) {
                    $windowLeft++;
                    while (
                        $windowLeft < $windowRight &&
                        $nums[$windowLeft] == $nums[$windowLeft - 1]
                    ) {
                        $windowLeft++;
                        continue;
                    }

                    continue;
                }

                if ($nums[$i] + $nums[$windowLeft] + $nums[$windowRight] > 0) {
                    $windowRight--;
                    while (
                        $windowLeft < $windowRight &&
                        $nums[$windowRight] == $nums[$windowRight + 1]
                    ) {
                        $windowRight--;
                        continue;
                    }

                    continue;
                }
            }
        }

        return $answer;
    }
}
// @lc code=end

// $Solution = new Solution();
// $answer = $Solution->threeSum([-3, -2, -2, 0, 0]);
// dump($answer);
