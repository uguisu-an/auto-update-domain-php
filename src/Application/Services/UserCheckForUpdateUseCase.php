<?php
namespace Masamitsu\AutoUpdate\Application\Services;

use DateTimeInterface;
use Masamitsu\AutoUpdate\Domain\Models\Package;
use Masamitsu\AutoUpdate\Domain\Models\Version;
use Masamitsu\AutoUpdate\Domain\Models\PackageId;
use Masamitsu\AutoUpdate\Domain\Models\PackageRepository;

/**
 * ユーザーはパッケージの更新を確認する
 */
class UserCheckForUpdateUseCase
{
    protected $packages;

    public function __construct(PackageRepository $packages)
    {
        $this->packages = $packages;
    }

    /**
     * パッケージの更新を確認する
     */
    public function checkForUpdate(
        string $packageId,
        string $currentVersion,
        DateTimeInterface $date
    ): array {
        $version = new Version($currentVersion);
        $package = $this->getPackage($packageId);
        $latestRelease = $package->latestRelease();
        if (empty($latestRelease) || !$latestRelease->isNewerThan($version)) {
            return [];
        }
        $releaseData = $latestRelease->toArray();
        return [
            [
                "version" => $releaseData["version"],
                "url" => $releaseData["url"],
                "note" => $releaseData["note"],
                "release_date" => $releaseData["publish_date"],
                "force_updates" => $this->forceUpdates(
                    $package,
                    $version,
                    $date
                ),
            ],
        ];
    }

    public function getPackage(string $packageId): Package
    {
        $package = $this->packages->find(new PackageId($packageId));
        if (empty($package)) {
            throw new \InvalidArgumentException("Package is not found.");
        }
        return $package;
    }

    public function forceUpdates(
        Package $package,
        Version $version,
        DateTimeInterface $date
    ): bool {
        $currentRelease = $package->currentRelease($version);
        return empty($currentRelease) || $currentRelease->isExpiredAt($date);
    }
}
