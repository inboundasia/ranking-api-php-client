<?php

use InboundAsia\RankingClient\RankingClient;

require __DIR__ . '/../vendor/autoload.php';

$token = '';

$Client = new RankingClient($token);

// $response = $Client->siteStore('https://ranking.works', 'Ranking', 'TW');
// $response = $Client->sitesList();
// $response = $Client->siteKeywordStore(4177, '隱形牙套');
// $response = $Client->siteKeywordSync(4177, ['隱適美']);
// $response = $Client->siteKeywords(1474);
// $response = $Client->siteRankings(1474, 'google');
// $response = $Client->deleteKeyword(24821);
$response = $Client->updateSiteRanking(4180);


print_r($response);