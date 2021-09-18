<?php

class Package
{
    public $id;

    protected $releases;

    public function __construct(string $id, $releases)
    {
        $this->id = $id;
        $this->releases = $releases;
    }

    public function latestVersion()
    {
        
    }

    public function version(string $version)
    {
    }
}
