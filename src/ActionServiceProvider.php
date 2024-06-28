<?php

namespace Visiarch\ActionServiceTrait;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

/**
 * This file is part of the Laravel Action package.
 *
 * @author Gusti Bagus Suandana <visiarch@gmail.com> (C)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class ActionServiceProvider extends PackageServiceProvider
{
    /**
     * Register the application services.
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-action')
            ->hasCommand(MakeAction::class);
    }
}
