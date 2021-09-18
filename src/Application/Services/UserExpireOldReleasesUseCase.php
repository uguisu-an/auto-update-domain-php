<?php

use Masamitsu\AutoUpdate\Domain\Models\PackageVersion;
use Masamitsu\AutoUpdate\Domain\Models\ReleaseRepository;
use Masamitsu\AutoUpdate\Query\Services\PackageQueryService;

class UserExpireOldReleasesUseCase
{
    protected $queryPackages;

    protected $releases;

    public function __construct(PackageQueryService $queryPackages, ReleaseRepository $releases)
    {
        $this->queryPackages = $queryPackages;
        $this->releases = $releases;
    }

    /**
     * 指定したバージョンよりも古いリリースをまとめて削除する
     */
    public function expireOldReleases(string $packageId, string $version): void
    {
        $package = $this->packages->getPackage($packageId);
        foreach ($package->olderReleasesThan($version) as $release) {
            $this->releases->destroy(new PackageVersion($release->packageId, $release->version));
        }
    }
}
