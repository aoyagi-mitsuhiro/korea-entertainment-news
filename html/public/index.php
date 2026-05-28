<?php


require_once __DIR__ . '/../vendor/autoload.php';

use Aoyagi\NewsHtml\NewsScraper;
use Aoyagi\NewsHtml\NewsDisplay;


try {
    $scraper = new NewsScraper();
    $display = new NewsDisplay();

    $news = $scraper->getTop10News();
    $display->displayNewsHTML($news);
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
