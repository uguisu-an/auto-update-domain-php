<?php
namespace Masamitsu\AutoUpdate\Domain\Models;

class PackageVersion
{
    protected $packageId;

    protected $version;

    public function __construct(PackageId $packageId, Version $version)
    {
        $this->packageId = $packageId;
        $this->version = $version;
    }

    public function packageId()
    {
        return $this->packageId;
    }

    public function version()
    {
        return $this->version;
    }

    public function equals(PackageVersion $packageVersion)
    {
        return $this->packageId->equals($packageVersion->packageId) && $this->version->equals($packageVersion->version);
    }

    public function isNewerThan(Version $version)
    {
        return $this->version->isNewerThan($version);
    }

    public function isOlderThan(Version $version)
    {
        return $this->version->isOlderThan($version);
    }

    public function __toString()
    {
        return "{$this->packageId}-{$this->version}";
    }
}
