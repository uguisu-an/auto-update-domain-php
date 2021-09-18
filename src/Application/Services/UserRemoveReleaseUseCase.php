<?php
namespace Masamitsu\AutoUpdate\Application\Services;

use Masamitsu\AutoUpdate\Domain\Models\PackageId;
use Masamitsu\AutoUpdate\Domain\Models\PackageVersion;
use Masamitsu\AutoUpdate\Domain\Models\ReleaseRepository;
use Masamitsu\AutoUpdate\Domain\Models\Version;

class UserRemoveReleaseUseCase
{
    protected $releases;

    public function __construct(ReleaseRepository $releases)
    {
        $this->releases = $releases;
    }

    public function removeRelease(string $packageId, string $version): void
    {
        $this->releases->destroy(new PackageVersion(new PackageId($packageId), new Version($version)));
    }
}
