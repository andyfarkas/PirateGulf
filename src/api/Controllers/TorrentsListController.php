<?php

namespace PirateGulf\Api\Controllers;

class TorrentsListController
{

    /**
     * @var \PirateGulf\Api\Repositories\ITorrentsRepository
     */
    private $torrentsRepository;

    public function __construct(\PirateGulf\Api\Repositories\ITorrentsRepository $repository)
    {
        $this->torrentsRepository = $repository;
    }

    public function getTorrentsList()
    {
        $data = $this->torrentsRepository->getTorrents();
        return new \Symfony\Component\HttpFoundation\JsonResponse($data);
    }
}