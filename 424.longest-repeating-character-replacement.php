<?php

namespace LeetCode\LongestRepeatingCharacterReplacement;

require __DIR__ . '/vendor/autoload.php';

/*
 * @lc app=leetcode id=424 lang=php
 *
 * [424] Longest Repeating Character Replacement
 */

// @lc code=start
class Solution
{

    /**
     * @param string $string
     * @param int $k
     * @return int
     */
    public function characterReplacement($string, $k)
    {
        $length = strlen($string);

        $left = 0;
        $right = 0;

        $count = [];
        $maxCount = 0;
        $maxLength = 0;

        for ($right = 0; $right < $length; $right++) {
            $count[$string[$right]]++;
            $maxCount = max($maxCount, $count[$string[$right]]);

            // if the (maxCount + k) <= (the current longest length), we move whole windows right.
            if ($right - $left + 1 > $maxCount + $k) {
                $count[$string[$left]]--;
                $left++;
                continue;
            }


            $maxLength = max($maxLength, $right - $left + 1);
        }

        return $maxLength;
    }
}
// @lc code=end
