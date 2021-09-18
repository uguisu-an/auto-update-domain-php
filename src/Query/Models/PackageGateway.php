<?php
namespace Masamitsu\AutoUpdate\Query\Models;

interface PackageGateway
{
    public function all(): array;

    public function get(string $packageId): ?Package;
}
