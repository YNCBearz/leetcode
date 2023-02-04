/*
 * @lc app=leetcode id=13 lang=csharp
 *
 * [13] Roman to Integer
 */

// @lc code=start

public class Solution {

    private readonly Dictionary<string,int> _mapping = new Dictionary<string,int>()
    {
        {"I", 1},
        {"IV", 4},
        {"V", 5},
        {"IX", 9},
        {"X", 10},
        {"XL", 40},
        {"L", 50},
        {"XC", 90},
        {"C", 100},
        {"CD", 400},
        {"D", 500},
        {"CM", 900},
        {"M", 1000},
    };

    public int RomanToInt(string s) {
        var charArray = s.ToCharArray();
        var result = 0;

        for (int i = 0; i < charArray.Length; i++)
        {
            if (i + 1 < charArray.Length && _mapping.ContainsKey($"{charArray[i]}{charArray[i + 1]}"))
            {
                result += _mapping[$"{charArray[i]}{charArray[i + 1]}"];
                i = i + 1;
            } else {
                result += _mapping[$"{charArray[i]}"];
            }
        }

        return result;

    }
}
// @lc code=end

