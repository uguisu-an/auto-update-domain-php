<?php
namespace Masamitsu\AutoUpdate\Application\Services;

use Masamitsu\AutoUpdate\Domain\Models\PackageId;
use Masamitsu\AutoUpdate\Domain\Models\PackageRepository;

/**
 * ユーザーはパッケージを削除する
 */
class UserDeletePackageUseCase
{
    protected $packages;

    public function __construct(PackageRepository $packages)
    {
        $this->packages = $packages;
    }

    public function deletePackage(string $packageId): void
    {
        $this->packages->destroy(new PackageId($packageId));
    }
}
