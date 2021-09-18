<?php
namespace Masamitsu\AutoUpdate\Application\Services;

use Masamitsu\AutoUpdate\Domain\Models\PackageId;
use Masamitsu\AutoUpdate\Domain\Models\PackageVersion;
use Masamitsu\AutoUpdate\Domain\Models\Release;
use Masamitsu\AutoUpdate\Domain\Models\ReleaseRepository;
use Masamitsu\AutoUpdate\Domain\Models\Version;

/**
 * ユーザーは新しいバージョンを追加する
 */
class UserAppendReleaseUseCase
{
    protected $releases;

    public function __construct(ReleaseRepository $releases)
    {
        $this->releases = $releases;
    }

    public function addRelease(string $packageId, string $version, string $url, string $note)
    {
        $release = new Release(new PackageVersion(new PackageId($packageId), new Version($version)), $url, $note);
        $this->releases->save($release);
    }
}
