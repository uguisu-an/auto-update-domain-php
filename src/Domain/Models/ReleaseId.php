<?php
namespace Masamitsu\AutoUpdate\Domain\Models;

class ReleaseId
{
    protected $packageId;

    protected $version;

    public function __construct(PackageId $packageId, Version $version)
    {
        $this->packageId = $packageId;
        $this->version = $version;
    }
}
