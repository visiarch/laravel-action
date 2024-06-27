<?php

namespace Visiarch\ActionServiceTrait;

use Illuminate\Support\ServiceProvider;
use Visiarch\ActionServiceTrait\MakeAction;

/**
 * This file is part of the Laravel Action package.
 *
 * @author Gusti Bagus Suandana <visiarch@gmail.com> (C)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class ActionServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->commands(MakeAction::class);
    }
}
