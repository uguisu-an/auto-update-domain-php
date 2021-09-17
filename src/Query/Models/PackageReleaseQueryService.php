<?php

interface PackageReleaseQueryService
{
    public function latestOf(
        string $packageId,
        string $currentVersion = null
    ): ?Release;

    public function versionOf(string $package, string $version): ?Release;
}
