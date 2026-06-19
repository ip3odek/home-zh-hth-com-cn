<?php

/**
 * 生成一个经过转义的 HTML 链接卡片
 *
 * @param string $url     链接地址
 * @param string $title   卡片标题
 * @param string $desc    卡片描述（可选）
 * @return string         安全的 HTML 字符串
 */
function renderLinkCard(string $url, string $title, string $desc = ''): string
{
    // 转义所有输出字段，防止 XSS
    $safeUrl   = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeDesc  = htmlspecialchars($desc, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    // 使用简单内联样式，不依赖外部 CSS
    $card  = '<div style="border:1px solid #ddd; border-radius:8px; padding:14px 18px;';
    $card .= 'max-width:400px; background:#f9f9f9; font-family:sans-serif;';
    $card .= 'margin:12px 0; box-shadow:0 1px 3px rgba(0,0,0,0.08);">';
    $card .= '<a href="' . $safeUrl . '" style="text-decoration:none; color:#2c6b9e;';
    $card .= 'font-weight:600; font-size:1.1em; display:block; margin-bottom:6px;">';
    $card .= $safeTitle . '</a>';
    if ($safeDesc !== '') {
        $card .= '<p style="margin:4px 0 0; color:#555; font-size:0.9em;">' . $safeDesc . '</p>';
    }
    $card .= '</div>';

    return $card;
}

// ---------- 示例数据 ----------
// 关联 URL 和核心关键词作为普通字符串嵌入
$demoUrl   = 'https://home-zh-hth.com.cn';
$demoTitle = '华体会 — 探索运动与娱乐的精彩世界';
$demoDesc  = '华体会汇聚多元赛事、互动社区与实时资讯，为爱好者打造一站式体验平台。';

// 输出示例卡片（直接运行此文件可查看效果）
echo renderLinkCard($demoUrl, $demoTitle, $demoDesc);
echo "\n";

// 无描述版本
echo renderLinkCard($demoUrl, '华体会');
echo "\n";

// 自定义卡片
echo renderLinkCard('https://example.com', '示例链接', '这是一个描述文本。');