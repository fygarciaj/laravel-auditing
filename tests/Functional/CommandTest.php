<?php

namespace Fygarciaj\Auditing\Tests\Functional;

use Fygarciaj\Auditing\Tests\AuditingTestCase;

class CommandTest extends AuditingTestCase
{
    /**
     * @test
     */
    public function itWillGenerateTheAuditDriver()
    {
        $driverFilePath = sprintf(
            '%s/AuditDrivers/TestDriver.php',
            $this->app->path()
        );

        $this->assertInstanceOf(
            \Illuminate\Foundation\Testing\PendingCommand::class,
            $this->artisan('auditing:audit-driver', [
                    'name' => 'TestDriver',
                ]
            )
        );

        $this->assertFileExists($driverFilePath);

        $this->assertTrue(unlink($driverFilePath));
    }
}
