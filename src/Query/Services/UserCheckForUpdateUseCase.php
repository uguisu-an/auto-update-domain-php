<?php
namespace Masamitsu\AutoUpdate\Application\Services;

use Masamitsu\AutoUpdate\Query\Models\Package;
use Masamitsu\AutoUpdate\Query\Models\PackageGateway;

/**
 * ユーザーはパッケージの更新を確認する
 */
class UserCheckForUpdateUseCase
{
    protected $packages;

    public function __construct(PackageGateway $packages)
    {
        $this->packages = $packages;
    }

    /**
     * パッケージの更新を確認する
     */
    public function checkForUpdate(string $packageId, string $currentVersion, \DateTimeInterface $date): array
    {
        $package = $this->getPackage($packageId);
        $latestVersion = $package->latestVersion();
        if (empty($latestVersion) || !$latestVersion->isNewerThan($currentVersion)) {
            return [];
        }
        return [
            [
                'version' => $latestVersion->version,
                'url' => $latestVersion->url,
                'note' => $latestVersion->note,
                'release_date' => $latestVersion->publish_date,
                'force_updates' => $this->forceUpdates($package, $currentVersion, $date),
            ],
        ];
    }

    public function getPackage(string $packageId): Package
    {
        $package = $this->packages->find(new PackageId($packageId));
        if (empty($package)) {
            throw new \InvalidArgumentException('Package is not found.');
        }
        return $package;
    }

    public function forceUpdates(Package $package, string $version, \DateTimeInterface $date): bool
    {
        $currentRelease = $package->currentVersion($version);
        return empty($currentRelease) || $currentRelease->isExpiredAt($date);
    }
}
