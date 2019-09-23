<?php

namespace Fygarciaj\Auditing\Tests;

use Orchestra\Testbench\TestCase;
use Fygarciaj\Auditing\AuditingServiceProvider;
use Fygarciaj\Auditing\Resolvers\IpAddressResolver;
use Fygarciaj\Auditing\Resolvers\UrlResolver;
use Fygarciaj\Auditing\Resolvers\UserAgentResolver;
use Fygarciaj\Auditing\Resolvers\UserResolver;

class AuditingTestCase extends TestCase
{
    /**
     * {@inheritdoc}
     */
    protected function getEnvironmentSetUp($app)
    {
        // Database
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        // Audit
        $app['config']->set('audit.drivers.database.connection', 'testing');
        $app['config']->set('audit.user.morph_prefix', 'user');
        $app['config']->set('audit.user.guards', [
            'web',
            'api',
        ]);
        $app['config']->set('audit.resolver.user', UserResolver::class);
        $app['config']->set('audit.resolver.url', UrlResolver::class);
        $app['config']->set('audit.resolver.ip_address', IpAddressResolver::class);
        $app['config']->set('audit.resolver.user_agent', UserAgentResolver::class);
        $app['config']->set('audit.console', true);
    }

    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->withFactories(__DIR__.'/database/factories');
    }

    /**
     * {@inheritdoc}
     */
    protected function getPackageProviders($app)
    {
        return [
            AuditingServiceProvider::class,
        ];
    }
}
