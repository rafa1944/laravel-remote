<?php

namespace Rafa1944\Remote\Commands;

use Illuminate\Console\Command;
use Rafa1944\Remote\Config\HostConfig;
use Rafa1944\Remote\Config\RemoteConfig;
use Spatie\Ssh\Ssh;

class RemoteCommand extends Command
{
    public $signature = 'remote {rawCommand} {--host=default} {--artisan}';

    public $description = 'Execute commands on a remote server';

    public function handle()
    {
        $hostConfig = RemoteConfig::getHost($this->option('host'));

        Ssh::create($hostConfig->user, $hostConfig->host)
            ->onOutput(function ($type, $line) {
                echo $line;
            })
            ->usePort($hostConfig->port)
            ->execute($this->getCommandToExecute($hostConfig));
    }

    protected function getCommandToExecute(HostConfig $hostConfig): array
    {
        $command = $this->argument('rawCommand');

        if ($this->option('artisan')) {
            $command = "php artisan '{$command}'";
        }

        return [
            "cd {$hostConfig->path}",
            $command,
        ];
    }
}
