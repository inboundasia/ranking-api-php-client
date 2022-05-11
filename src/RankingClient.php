<?php

namespace InboundAsia\RankingClient;


class RankingClient
{
    const BaseURL = 'https://api.ranking.works';

    const GeneralHeaders = [
        'Content-Type: application/json',
        'Accept: application/json'
    ];

    /** @var string */
    private $apikey;

    /**
     * Constructor
     *
     * @param string $apikey
     */
    public function __construct(string $apikey)
    {
        $this->apikey = $apikey;
    }

    public function sitesList()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::BaseURL . '/sites');
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array_merge(self::GeneralHeaders, ['Authorization: Bearer ' . $this->apikey]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $response = json_decode($output);

        return $response;
    }

    public function siteKeywords($siteId)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::BaseURL . "/sites/{$siteId}/keywords");
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array_merge(self::GeneralHeaders, ['Authorization: Bearer ' . $this->apikey]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $response = json_decode($output);

        return $response;
    }

    public function siteKeywordsPosition($siteId, $search_engine = 'google', $date = null)
    {
        $ch = curl_init();
        $query = http_build_query(array('date' => $date, 'search_engine' => $search_engine));
        $url = self::BaseURL . "/sites/{$siteId}/keywords_position?" . $query;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array_merge(self::GeneralHeaders, ['Authorization: Bearer ' . $this->apikey]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $response = json_decode($output);

        return $response;
    }

    public function siteRankings($siteId, $search_engine = 'google', $date = null)
    {
        $ch = curl_init();
        $query = http_build_query(array('date' => $date, 'search_engine' => $search_engine));
        $url = self::BaseURL . "/sites/{$siteId}/rankings?" . $query;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array_merge(self::GeneralHeaders, ['Authorization: Bearer ' . $this->apikey]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $response = json_decode($output);

        return $response;
    }

    public function siteStore($url, $name, $country)
    {
        $params = [
            'url' => $url,
            'name' => $name,
            'country' => $country,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::BaseURL . "/sites");
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array_merge(self::GeneralHeaders, ['Authorization: Bearer ' . $this->apikey]));
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $output = curl_exec($ch);
        $response = json_decode($output);

        return $response;
    }

    public function siteKeywordStore($siteId, $keyword)
    {
        $params = [
            'term' => $keyword,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::BaseURL . "/sites/{$siteId}/keywords");
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array_merge(self::GeneralHeaders, ['Authorization: Bearer ' . $this->apikey]));
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $output = curl_exec($ch);
        $response = json_decode($output);

        return $response;
    }

    public function siteKeywordSync($siteId, array $keywords = [])
    {
        $params = [
            'terms' => $keywords,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::BaseURL . "/sites/{$siteId}/keywords.sync");
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array_merge(self::GeneralHeaders, ['Authorization: Bearer ' . $this->apikey]));
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $output = curl_exec($ch);
        $response = json_decode($output);

        return $response;
    }

    public function deleteKeyword($keywordId)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::BaseURL . "/keywords/{$keywordId}");
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array_merge(self::GeneralHeaders, ['Authorization: Bearer ' . $this->apikey]));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $output = curl_exec($ch);
        $response = json_decode($output);

        return $response;
    }

    public function updateSiteRanking($siteId)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::BaseURL . "/update_site_ranking/{$siteId}");
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array_merge(self::GeneralHeaders, ['Authorization: Bearer ' . $this->apikey]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $response = json_decode($output);

        return $response;
    }

    public function serpHistories($date, $url, $term, $exact = false)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::BaseURL . "/serps_history");
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array_merge(self::GeneralHeaders, ['Authorization: Bearer ' . $this->apikey]));
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(compact('date', 'url', 'term', 'exact')));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $output = curl_exec($ch);
        $response = json_decode($output);

        return $response;
    }
}