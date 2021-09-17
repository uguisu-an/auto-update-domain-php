<?php

interface PackageQueryService
{
    public function query(PackageQueryOptions $options): array;
}
