/*
 * @lc app=leetcode id=9 lang=csharp
 *
 * [9] Palindrome Number
 */

// @lc code=start
using System;
using System.Runtime.Intrinsics.X86;

public class Solution {
    public bool IsPalindrome(int i) {
        if (i == 0)
        {
            return true;
        }

        if (i < 0 || i % 10 == 0)
        {
            return false;
        }

        var revertedNumber = 0;
        while (i > revertedNumber)
        {
            revertedNumber = revertedNumber * 10 + i % 10;
            i = i/10;
        }

		// When the length is an odd number, we can get rid of the middle digit by revertedNumber/10
		// For example when the input is 12321, at the end of the while loop we get x = 12, revertedNumber = 123,
		// since the middle digit doesn't matter in palidrome(it will always equal to itself), we can simply get rid of it.
		return i == revertedNumber || i == revertedNumber / 10;

    }
}
// @lc code=end

