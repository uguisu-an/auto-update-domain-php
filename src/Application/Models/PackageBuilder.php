<?php

class PackageBuilder
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
