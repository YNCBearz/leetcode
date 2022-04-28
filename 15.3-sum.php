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
        if (count($nums) < 3) {
            return $answer;
        }

        $keyMapping = [];
        foreach ($nums as $key => $value) {
            if (isset($keyMapping[$value])) {
                $keyMapping[$value][] = $key;
                continue;
            }

            $keyMapping[$value][] = $key;
        }

        $windowLeft = 0;
        $windowRight = 1;

        while ($windowLeft < count($nums) - 2) {
            while ($windowRight < count($nums)) {
                $total = $nums[$windowLeft] + $nums[$windowRight];

                $goal = 0 - $total;

                if (isset($keyMapping[$goal])) {
                    foreach ($keyMapping[$goal] as $key) {
                        if (
                            $key != $windowLeft &&
                            $key != $windowRight
                        ) {
                            $matchKeys = [$windowLeft, $windowRight, $key];
                            sort($matchKeys);

                            $answerValue = [
                                $nums[$matchKeys[0]],
                                $nums[$matchKeys[1]],
                                $nums[$matchKeys[2]],
                            ];
                            sort($answerValue);

                            $answerKey = implode('-', $answerValue);
                            $answer[$answerKey] = $answerValue;
                        }
                    }
                }

                $windowRight++;
            }

            $windowLeft++;
            $windowRight = $windowLeft + 1;
        }

        return $answer;
    }
}
// @lc code=end

// $solution = new Solution();
// $answer = $solution->threeSum([-1, 0, 1, 2, -1, -4]);
// dump($answer);
