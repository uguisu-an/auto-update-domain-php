<?php

use Masamitsu\AutoUpdate\Domain\Models\Version;
use Masamitsu\AutoUpdate\Domain\Models\PackageId;
use Masamitsu\AutoUpdate\Domain\Models\PackageVersion;
use Masamitsu\AutoUpdate\Domain\Models\ReleaseRepository;
use Masamitsu\AutoUpdate\Query\Services\PackageQueryService;

class UserExpireOldReleasesUseCase
{
    protected $packages;

    protected $releases;

    public function __construct(PackageQueryService $packages, ReleaseRepository $releases)
    {
        $this->packages = $packages;
        $this->releases = $releases;
    }

    /**
     * 指定したバージョンよりも古いリリースをまとめて削除する
     */
    public function expireOldReleases(string $packageId, string $version): void
    {
        $package = $this->packages->getPackage($packageId);
        foreach ($package->olderReleasesThan($version) as $release) {
            $this->releases->destroy(
                new PackageVersion(new PackageId($release->packageId), new Version($release->version))
            );
        }
    }
}
