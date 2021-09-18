<?php
namespace Masamitsu\AutoUpdate\Application\Services;

use Masamitsu\AutoUpdate\Domain\Models\Package;
use Masamitsu\AutoUpdate\Domain\Models\Version;
use Masamitsu\AutoUpdate\Domain\Models\PackageId;
use Masamitsu\AutoUpdate\Domain\Models\PackageRepository;

class UserRetrieveReleaseUseCase
{
    protected $packages;

    public function __construct(PackageRepository $packages)
    {
        $this->packages = $packages;
    }

    public function retrieveRelease(string $packageId, string $version): ?array
    {
        $v = new Version($version);
        $package = $this->getPackage($packageId);
        $release = $package->currentRelease(new Version($version));
        if (empty($release)) {
            return null;
        }
        return [
            'package_id' => (string) $package->id(),
            'version' => (string) $release->version(),
            'url' => (string) $release->url(),
            'publish_date' => $release->publishDate(),
            'expire_date' => $release->expireDate(),
            'published' => $release->isPublishedAt($date),
            'expired' => $release->isExpiredAt($date),
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
}
