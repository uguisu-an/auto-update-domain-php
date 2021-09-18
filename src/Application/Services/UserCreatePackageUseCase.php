<?php
namespace Masamitsu\AutoUpdate\Application\Services;

use Masamitsu\AutoUpdate\Domain\Models\Package;
use Masamitsu\AutoUpdate\Domain\Models\PackageId;
use Masamitsu\AutoUpdate\Domain\Models\PackageRepository;

/**
 * ユーザーはパッケージを追加する
 */
class UserCreatePackageUseCase
{
    protected $packages;

    public function __construct(PackageRepository $packages)
    {
        $this->packages = $packages;
    }

    public function createPackage(string $name): void
    {
        $package = new Package(new PackageId($name));
        $this->packages->save($package);
    }
}
