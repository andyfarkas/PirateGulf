<?php

namespace PirateGulf\Api\Repositories;

class FileTorrentsRepository implements ITorrentsRepository
{

    /**
     * @var string
     */
    private $dataFile;

    /**
     * @param string $dataFilePath
     */
    public function __construct($dataFilePath)
    {
        $this->dataFile = $dataFilePath;
    }

    /**
     * @return array
     */
    public function getTorrents()
    {
        return json_decode(file_get_contents($this->dataFile));
    }
}