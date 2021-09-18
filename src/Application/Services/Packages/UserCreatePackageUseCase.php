<?php
namespace Masamitsu\AutoUpdate\Application\Services\Packages;

use Masamitsu\AutoUpdate\Application\Models\PackageBuilder;

class UserCreatePackageUseCase
{
    protected $packages;

    public function __construct($packages)
    {
        $this->packages = $packages;
    }

    public function createPackage(PackageBuilder $packageBuilder): void
    {
        $this->packages->save($packageBuilder->create());
    }
}
