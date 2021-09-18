<?php
namespace Masamitsu\AutoUpdate\Application\Services\Releases;

use Masamitsu\AutoUpdate\Domain\Models\Package;
use Masamitsu\AutoUpdate\Domain\Models\PackageId;
use Masamitsu\AutoUpdate\Domain\Models\PackageRepository;
use Masamitsu\AutoUpdate\Application\Models\ReleaseBuilder;

class UserAddReleaseUseCase
{
    protected $packages;

    public function __construct(PackageRepository $packages)
    {
        $this->packages = $packages;
    }

    public function addRelease(string $packageId, ReleaseBuilder $releaseBuilder)
    {
        $package = $this->getPackage($packageId);
        $package->release($releaseBuilder->create());
        $this->packages->save($package);
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
