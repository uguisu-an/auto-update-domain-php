<?php
namespace Masamitsu\AutoUpdate\Domain\Models;

interface ReleaseRepository
{
    public function save(Release $release): void;

    public function find(PackageVersion $version): ?Release;

    public function destroy(PackageVersion $version): void;
}
