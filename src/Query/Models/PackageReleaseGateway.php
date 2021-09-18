<?php
namespace Masamitsu\AutoUpdate\Query\Models;

interface PackageReleaseGateway
{
    public function all(string $packageId): Releases;

    public function get(string $packageId, string $version): ?Release;
}
