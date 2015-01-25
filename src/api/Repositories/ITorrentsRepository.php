<?php

namespace PirateGulf\Api\Repositories;

interface ITorrentsRepository
{
    /**
     * @return array
     */
    public function getTorrents();
}