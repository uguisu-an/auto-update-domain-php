<?php

class ReleaseBuilder
{
    protected $url;

    protected $note;

    public function __construct(string $url, string $note)
    {
        $this->url = $url;
        $this->note = $note;
    }
}
