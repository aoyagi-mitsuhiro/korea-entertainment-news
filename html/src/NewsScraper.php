<?php

namespace Aoyagi\NewsHtml;

use Symfony\Component\Panther\Client;

class NewsScraper
{
    private $url = "https://entertain.naver.com/ranking";

    public function getTop10News(): array
    {
        $client = Client::createChromeClient(null, [
            '--headless',                  // excute background 
            '--no-sandbox',                // Docker root 権限衝突防止
            '--disable-dev-shm-usage',     // メモリー不足防止
            '--disable-gpu'                // GPU off
        ]);

        $crawler = $client->request('GET', $this->url);
        $news = $crawler->filter('li.NewsItem_news_item__fhEmd')->each(function ($node) {
            $title = trim($node->filter('.NewsItem_title__BXkJ6')->text());
            $link = trim($node->filter('a.NewsItem_link_news__tD7x3')->attr('href'));

            if ($title !== '' && $link !== '') {
                return [
                    'title' => $title,
                    'url' => $link
                ];
            }

            return null;
        });

        $all_news = array_filter($news);
        $top10_news = array_slice($all_news, 0, 10);

        return $top10_news;
    }
}
