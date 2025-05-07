<?php

namespace LaravelLangSyncInertia\Commands;

use Illuminate\Console\Command;

class InstallLang extends Command
{
    protected $signature = 'erag:install-lang';
    protected $description = '📦 Publish language configuration and initialize LaravelLangSyncInertia.';

    public function handle()
    {
        $this->info('🔧 Publishing language configuration...');
        $this->call('vendor:publish', [
            '--tag' => 'erag:publish-lang-config',
            '--force' => true,
        ]);

        $this->info('✅ Language configuration published successfully.');
        $this->newLine();
        $this->info('🎉 LaravelLangSyncInertia installation completed!');
    }
}
