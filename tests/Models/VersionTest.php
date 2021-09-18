<?php
namespace Tests\Models;

use Iimasamitsu\AutoUpdate\Domain\Models\Version;
use Tests\TestCase;

/**
 * VersionTest
 */
class VersionTest extends TestCase
{
    /**
     * @dataProvider provideEquals
     */
    public function test_equals(string $version, string $otherVersion, bool $result)
    {
        $this->assertEquals($result, (new Version($version))->equals(new Version($otherVersion)));
    }

    public function provideEquals()
    {
        return [['1.0.0', '1.0.0', true], ['2.0.5', '2.0.4', false]];
    }

    /**
     * @dataProvider provideIsNewerThan
     */
    public function test_isNewerThan(string $version, string $otherVersion, bool $result)
    {
        $this->assertEquals($result, (new Version($version))->isNewerThan(new Version($otherVersion)));
    }

    public function provideIsNewerThan()
    {
        return [
            ['0.1.0', '1.0.0', false],
            ['1.0.0', '1.0.0', false],
            ['1.0.5', '1.0.4', true],
            ['2.0.3', '2.0.3-beta', true],
        ];
    }
}
