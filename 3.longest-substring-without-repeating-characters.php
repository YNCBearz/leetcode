<?php

namespace LeetCode\LongestSubstringWithoutRepeatintCharacters;
/*
 * @lc app=leetcode id=3 lang=php
 *
 * [3] Longest Substring Without Repeating Characters
 */

// @lc code=start
class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    public function lengthOfLongestSubstring($string)
    {
        $longestNotRepeatingCharactersLength = 0;
        while (
            strlen($string) > $longestNotRepeatingCharactersLength &&
            $longestNotRepeatingCharactersLength <= 128
        ) {

            $count = $this->longestNotRepeatingCharactersLength($string);
            if ($count > $longestNotRepeatingCharactersLength) {
                $longestNotRepeatingCharactersLength = $count;
            }

            $string = substr($string, 1);
        }

        return $longestNotRepeatingCharactersLength;
    }

    public function longestNotRepeatingCharactersLength(string $string): int
    {
        $stringArray = str_split($string);

        $result = 0;
        $usedCharacters = [];
        foreach ($stringArray as $key => $character) {
            if (isset($usedCharacters[$character])) {
                return $result;
            }

            $usedCharacters[$character] = true;
            $result++;
        }

        return $result;
    }
}
// @lc code=end
