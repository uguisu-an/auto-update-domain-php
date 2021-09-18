<?php
namespace Masamitsu\AutoUpdate\Query\Services;

use Masamitsu\AutoUpdate\Query\Models\Package;
use Masamitsu\AutoUpdate\Query\Models\PackageGateway;

/**
 * パッケージの更新を確認するサービス
 */
class PackageQueryService
{
    protected $packages;

    public function __construct(PackageGateway $packages)
    {
        $this->packges = $packages;
    }

    public function all(): array
    {
        return $this->packages->all();
    }

    /**
     * 指定したパッケージを取得する
     */
    public function getPackage(string $packageId): Package
    {
        $package = $this->packages->get($packageId);
        if (empty($package)) {
            throw new \InvalidArgumentException('Package is not found.');
        }
        return $package;
    }

    /**
     * 新しいバージョンが配信されたかどうか確認する
     */
    public function checkForUpdate(string $packageId, string $currentVersion, \DateTimeInterface $date): array
    {
        $package = $this->getPackage($packageId);
        $release = $package->latestVersion($date);
        if (empty($release) || !$release->isNewerThan($currentVersion)) {
            return [];
        }
        return [$release->toArray()];
    }

    /**
     * 現在のバージョンが廃止されたかどうか確認する
     */
    public function checkForExpire(string $packageId, string $currentVersion, \DateTimeInterface $date): bool
    {
        $package = $this->getPackage($packageId);
        $release = $package->currentVersion($currentVersion);
        return empty($release) || $release->isExpiredAt($date);
    }
}
