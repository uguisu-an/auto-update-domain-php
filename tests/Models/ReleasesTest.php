<?php
namespace Tests\Models;

use Iimasamitsu\AutoUpdate\Domain\Models\Release;
use Iimasamitsu\AutoUpdate\Domain\Models\ReleaseId;
use Iimasamitsu\AutoUpdate\Domain\Models\Releases;
use Tests\TestCase;

class ReleasesTest extends TestCase
{
    public function test_リリースを追加する()
    {
        $releases = new Releases();
        $releases->add(new Release(new ReleaseId('1'), ))
    }
}
