<?php

namespace PirateGulf\Api\Tests\Unit;

class TorrentsListControllerTests extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function getTorrentsList_whenCalled_returnsJSONResponseWithListOfTorrents()
    {
        $torrentsListData = array(
            array(
                'id' => 1,
                'title' => 'Sample Torrent',
            )
        );
        $expectedResult = new \Symfony\Component\HttpFoundation\JsonResponse($torrentsListData);

        $torrentsRepositoryFake = $this->getMock('PirateGulf\Api\Repositories\ITorrentsRepository');
        $torrentsRepositoryFake->expects($this->any())
                                ->method('getTorrents')
                                ->will($this->returnValue($torrentsListData));

        $controller = new \PirateGulf\Api\Controllers\TorrentsListController($torrentsRepositoryFake);
        $result = $controller->getTorrentsList();

        $this->assertEquals($expectedResult->getContent(), $result->getContent());
    }
}