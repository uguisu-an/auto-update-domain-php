<?php
namespace Masamitsu\AutoUpdate\Application\Services;

use DateTimeInterface;
use InvalidArgumentException;
use Masamitsu\AutoUpdate\Domain\Models\Version;
use Masamitsu\AutoUpdate\Domain\Models\PackageId;
use Masamitsu\AutoUpdate\Domain\Models\PackageVersion;
use Masamitsu\AutoUpdate\Domain\Models\ReleaseRepository;

class UserExpireReleaseUseCase
{
    protected $releases;

    public function __construct(ReleaseRepository $releases)
    {
        $this->releases = $releases;
    }

    public function expireRelease(string $packageId, string $version, DateTimeInterface $publishDate): void
    {
        $release = $this->getRelease($packageId, $version);
        $release->expire($publishDate);
        $this->releases->save($release);
    }

    private function getRelease(string $packageId, string $version)
    {
        $release = $this->releases->find(new PackageVersion(new PackageId($packageId), new Version($version)));
        if (empty($release)) {
            throw new InvalidArgumentException('Package version is not found.');
        }
        return $release;
    }
}
