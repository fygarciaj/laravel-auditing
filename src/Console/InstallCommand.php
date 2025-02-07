<?php

namespace Fygarciaj\Auditing\Console;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Console\DetectsApplicationNamespace;

class InstallCommand extends Command
{
    use DetectsApplicationNamespace;

    /**
     * {@inheritdoc}
     */
    protected $signature = 'auditing:install';

    /**
     * {@inheritdoc}
     */
    protected $description = 'Install all of the Auditing resources';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $this->comment('Publishing Auditing Configuration...');
        $this->callSilent('vendor:publish', ['--tag' => 'config']);

        $this->comment('Publishing Auditing Migrations...');
        $this->callSilent('vendor:publish', ['--tag' => 'migrations']);

        $this->registerAuditingServiceProvider();

        $this->info('Auditing installed successfully.');
    }

    /**
     * Register the Auditing service provider in the application configuration file.
     *
     * @return void
     */
    protected function registerAuditingServiceProvider()
    {
        $namespace = str_replace_last('\\', '', $this->getAppNamespace());

        $appConfig = file_get_contents(config_path('app.php'));

        if (Str::contains($appConfig, 'Fygarciaj\\Auditing\\AuditingServiceProvider::class')) {
            return;
        }

        file_put_contents(config_path('app.php'), str_replace(
            "{$namespace}\\Providers\EventServiceProvider::class,".PHP_EOL,
            "{$namespace}\\Providers\EventServiceProvider::class,".PHP_EOL."        Fygarciaj\Auditing\AuditingServiceProvider::class,".PHP_EOL,
            $appConfig
        ));
    }
}
