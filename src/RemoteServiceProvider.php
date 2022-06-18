<?php

namespace Rafa1944\Remote;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Rafa1944\Remote\Commands\RemoteCommand;

class RemoteServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-remote')
            ->hasConfigFile()
            ->hasCommand(RemoteCommand::class);
    }
}
