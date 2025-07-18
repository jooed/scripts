<?php
function fibonacci(int $n, array &$memo = []): int {
    if ($n < 0) {
        throw new InvalidArgumentException("输入必须是非负整数");
    }
    if ($n === 0) return 0;
    if ($n === 1) return 1;

    if (isset($memo[$n])) {
        return $memo[$n]; // 如果已计算过，直接返回缓存
    }

    // 递归计算并缓存结果
    $memo[$n] = fibonacci($n - 1, $memo) + fibonacci($n - 2, $memo);
    return $memo[$n];
}

// 测试：输出前 10 个斐波那契数
for ($i = 0; $i < 10; $i++) {
    echo "F($i) = " . fibonacci($i) . PHP_EOL;
}
?>
