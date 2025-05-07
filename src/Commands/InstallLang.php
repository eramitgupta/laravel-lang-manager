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
        $this->info('✅ Configuration published successfully.');
        $this->newLine();

        // Ask for frontend framework
        $choice = $this->choice(
            '🎯 Which frontend framework are you using?',
            ['Vue.js', 'React.js'],
            0
        );

        if ($choice === 'Vue.js') {
            $this->info('📦 Publishing Vue composable...');
            $this->call('vendor:publish', [
                '--tag' => 'erag:publish-lang-composable-vue',
                '--force' => true,
            ]);
            $this->info('✅ Vue composable published successfully.');
        }

        if ($choice === 'React.js') {
            $this->info('📦 Publishing React composable...');
            $this->call('vendor:publish', [
                '--tag' => 'erag:publish-lang-composable-react',
                '--force' => true,
            ]);
            $this->info('✅ React composable published successfully.');
        }

        $this->newLine();
        $this->info('🎉 LaravelLangSyncInertia installation completed!');
    }
}
