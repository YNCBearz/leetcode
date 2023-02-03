/*
 * @lc app=leetcode id=9 lang=csharp
 *
 * [9] Palindrome Number
 */

// @lc code=start
using System;

public class Solution {
    public bool IsPalindrome(int i) {
        var x = i.ToString();
        var y = StringReverse(x);

        return x == y;
    }

    private string StringReverse(string s) {
        char[] ch = s.ToCharArray();
        Array.Reverse(ch);
        return new String(ch);
    }
}
// @lc code=end

