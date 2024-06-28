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
     * Configure the package.
     *
     * @param  Package  $package  The Laravel package object.
     */
    public function configurePackage(Package $package): void
    {
        // Configure the Laravel package.
        $package
            ->name('laravel-action') // Set the package name.
            ->hasCommand(MakeAction::class); // Register the command.
    }
}
