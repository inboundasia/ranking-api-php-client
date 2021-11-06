# Ranking API Client

```
composer require inboundasia/ranking-api-client
```

# Usages

Site Lists

```
$Client = new RankingClient($token);
$response = $Client->sitesList();
```

Site Create

```
$Client = new RankingClient($token);
$response = $Client->siteStore('https://ranking.works', 'Ranking', 'TW');
```

Site Keywords

```
$SiteId = 1474;
$Client = new RankingClient($token);
$response = $Client->siteKeywords($SiteId);
```

Site Rankings

```
$SiteId = 1474;
$SearchEngine = 'google';
$Client = new RankingClient($token);
$response = $Client->siteRankings($SiteId, $SearchEngine);
```

Add Keyword to Site

```
$SiteId = 1474;
$Keyword = '隱形牙套';
$Client = new RankingClient($token);
$response = $Client->siteKeywordStore($SiteId, $keyword);
```

Site Keyword Sync

```
$SiteId = 1474;
$Keywords = ['隱形牙套', '隱適美費用'];
$Client = new RankingClient($token);
$response = $Client->siteKeywordStore($SiteId, $keywords);
```

Delete Keyword

```
$KeywordId = 24821;
$Client = new RankingClient($token);
$response = $Client->deleteKeyword($KeywordId);
```
