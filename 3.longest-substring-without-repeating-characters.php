<?php

namespace LeetCode\LongestSubstringWithoutRepeatintCharacters;

require __DIR__ . '/vendor/autoload.php';

/*
 * @lc app=leetcode id=3 lang=php
 *
 * [3] Longest Substring Without Repeating Characters
 */

// @lc code=start
class Solution
{

    /**
     * @param string $string
     * @return int
     */
    public function lengthOfLongestSubstring($string)
    {
        $answer = 0;

        $length = strlen($string);
        if ($length == 0) {
            return $answer;
        }

        $windowLeft = 0;
        $windowRight = 0;
        $usedCharacters = [];
        while ($windowRight < $length) {
            $character = $string[$windowRight];

            while (
                isset($usedCharacters[$character]) &&
                $windowLeft <= $usedCharacters[$character]
            ) {
                $windowLeft++;
            }

            $usedCharacters[$character] = $windowRight;
            $windowRight++;

            $answer = max($answer, $windowRight - $windowLeft);
        }

        return $answer;
    }
}
// @lc code=end
