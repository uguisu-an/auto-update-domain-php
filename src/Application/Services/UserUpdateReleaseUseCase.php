<?php
namespace Masamitsu\AutoUpdate\Application\Services;

use InvalidArgumentException;
use Masamitsu\AutoUpdate\Domain\Models\Version;
use Masamitsu\AutoUpdate\Domain\Models\PackageId;
use Masamitsu\AutoUpdate\Domain\Models\PackageVersion;
use Masamitsu\AutoUpdate\Domain\Models\ReleaseRepository;

/**
 * ユーザーはリリースを更新する
 */
class UserUpdateReleaseUseCase
{
    protected $releases;

    public function __construct(ReleaseRepository $releases)
    {
        $this->releases = $releases;
    }

    public function updateRelease(string $packageId, string $version, string $url, string $note)
    {
        $release = $this->getRelease($packageId, $version);
        $release->setUrl($url);
        $release->setNote($note);
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
