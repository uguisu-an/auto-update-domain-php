<?php
namespace Masamitsu\AutoUpdate\Domain\Models;

interface PackageRepository
{
    public function save(Package $package): void;

    public function find(PackageId $id): ?Package;

    public function destroy(PackageId $id): void;
}
