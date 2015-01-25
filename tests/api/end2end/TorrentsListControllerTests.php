<?php

namespace PirateGulf\Api\Tests\End2End;

class TorrentsListControllerTests extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function torrents_getRequest_returnsListOfTorrentsInJSON()
    {
        $expectedResult = array(
            array(
                'id' => 1,
                'title' => 'Torrent #1',
            ),
            array(
                'id' => 2,
                'title' => 'Torrent #2',
            ),
        );

        $result = $this->httpGet('http://pirategulf.dev/api/torrents');

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @param string $url
     * @return array
     */
    protected function httpGet($url)
    {
        $client = new \PirateGulf\Http\Client\JSONClient(new \Guzzle\Http\Client());
        return $client->get($url);
    }
}