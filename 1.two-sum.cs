/*
 * @lc app=leetcode id=1 lang=csharp
 *
 * [1] Two Sum
 */

// @lc code=start
using System.Collections.Generic;
using System.Linq;

public class Solution {

    private Dictionary<int, List<int>> existNumbers = new Dictionary<int, List<int>>();

    private int[] result = new int[2];
    public int[] TwoSum(int[] nums, int target) {

        for (int i = 0; i < nums.Length; i++)
        {
            var num = nums[i];

            var remainder = target - num;

            if (existNumbers.ContainsKey(remainder))
            {
                result[0] = existNumbers[remainder].First();
                result[1] = i;
                break;
            }

            if (existNumbers.ContainsKey(num))
            {
                List<int> list = existNumbers[num];
                list.Add(i);
            } else {
                var list = new List<int>();
                list.Add(i);
                existNumbers.Add(num, list);
            }
        }

        return result;
    }
}
// @lc code=end

