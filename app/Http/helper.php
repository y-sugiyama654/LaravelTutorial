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
        return $pageTitle . ' | ' . $baseTitle;
    }
}

if (!function_exists('gravatar_for'))
{
    function gravatar_for($user, $options = ["size" => 80])
    {
        $gravatar_id = md5(strtolower($user->email));
        $gravatar_url = "https://secure.gravatar.com/avatar/{$gravatar_id}?s={$options["size"]}";
        return Html::image($gravatar_url, $user->name, ["class" => "gravatar"]);
    }
}

