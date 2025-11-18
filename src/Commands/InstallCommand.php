<?php

namespace UendelSilveira\ApiConnection\AuthApi\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth-api:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the auth-api package';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Installing auth-api...');

        $this->info('Installing Laravel Passport...');
        $this->call('passport:install');

        $this->info('Publishing configuration and migrations...');
        $this->call('vendor:publish', [
            '--provider' => 'UendelSilveira\ApiConnection\AuthApi\AuthApiServiceProvider',
            '--tag' => ['auth-api-config', 'auth-api-migrations']
        ]);

        $this->createPasswordGrantClient();

        $this->displayDocumentation();

        $this->info('auth-api installed successfully.');
    }

    private function createPasswordGrantClient()
    {
        $this->info('Creating a password grant client...');
        $clientName = $this->ask('What should we name the password grant client?', 'Default Password Client');

        Artisan::call('passport:client', [
            '--password' => true,
            '--name' => $clientName,
            '--no-interaction' => true,
        ]);

        $output = Artisan::output();
        $this->updateEnvFile($output);
    }

    private function updateEnvFile($output)
    {
        $this->info('Updating .env file...');

        preg_match('/Client ID: (\d+)/', $output, $clientIdMatches);
        preg_match('/Client secret: (\w+)/', $output, $clientSecretMatches);

        if (!isset($clientIdMatches[1]) || !isset($clientSecretMatches[1])) {
            $this->error('Could not find client ID or secret in the output. Please add them to your .env file manually.');
            return;
        }

        $clientId = $clientIdMatches[1];
        $clientSecret = $clientSecretMatches[1];

        $envFilePath = $this->laravel->basePath('.env');

        if (!file_exists($envFilePath)) {
            $this->error('.env file not found.');
            return;
        }

        $envFileContent = file_get_contents($envFilePath);

        $envFileContent = preg_replace('/^PASSPORT_PASSWORD_GRANT_CLIENT_ID=.*/m', 'PASSPORT_PASSWORD_GRANT_CLIENT_ID=' . $clientId, $envFileContent);
        $envFileContent = preg_replace('/^PASSPORT_PASSWORD_GRANT_CLIENT_SECRET=.*/m', 'PASSPORT_PASSWORD_GRANT_CLIENT_SECRET=' . $clientSecret, $envFileContent);

        file_put_contents($envFilePath, $envFileContent);

        $this->info('Client credentials saved to .env file.');
    }

    private function displayDocumentation()
    {
        $this->info('---');
        $this->comment('Next steps:');
        $this->line('1. Run your migrations: `php artisan migrate`');
        $this->line('2. Add the `HasApiTokens` trait to your User model.');
        $this->line('3. Configure the `auth` guard in `config/auth.php` to use the `passport` driver.');
        $this->info('---');
    }
}
