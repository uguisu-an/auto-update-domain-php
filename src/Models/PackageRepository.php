<?php
namespace Iimasamitsu\AutoUpdate\Domain\Models;

interface PackageRepository
{
    public function save(Package $package): void;

    public function find(PackageId $id): ?Package;
}
