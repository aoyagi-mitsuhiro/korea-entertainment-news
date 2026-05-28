<?php

namespace Aoyagi\NewsHtml;

class NewsDisplay
{
    public function displayNewsHTML(array $newslist): void
    {
        echo "<h1>トップ10ニュース</h1>";

        $count = 1;
        foreach ($newslist as $news) {
            echo $count . "位 " . "<a href='" . $news['url'] . "' target='_blank' style='text-decoration: none; color: blue;'>" . $news['title'] . "</a> <br>";
            $count++;
        }
    }
}
