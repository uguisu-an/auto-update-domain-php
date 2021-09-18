<?php
namespace Masamitsu\AutoUpdate\Application\Models;

use Masamitsu\AutoUpdate\Domain\Models\Package;
use Masamitsu\AutoUpdate\Domain\Models\PackageId;

class PackageBuilder
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function create(): Package
    {
        return new Package(new PackageId($this->name));
    }
}
