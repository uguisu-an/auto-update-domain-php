<?php

class PackageQueryOptions
{
    protected $names;

    public function __construct($options)
    {
        if (!empty($options["names"])) {
            $this->names = $options["names"];
        }
    }
}
