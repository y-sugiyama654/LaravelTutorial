<?php

/**
 * ページごとの完全なページタイトルを返す
 *
 * @param string $pageTitle ページタイトル
 * @return string 完全なページタイトル
 */
function setFullTitle($pageTitle = '')
{
    // ベースとなるタイトル
    $baseTitle = "Laravel Tutorial Sample App";
    
    if(empty($pageTitle)) {
        return $baseTitle;
    } else {
        return $pageTitle . '| ' . $baseTitle;
    }
}
