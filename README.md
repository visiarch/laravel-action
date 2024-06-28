![laravel Action](https://github.com/visiarch/laravel-action/blob/main/images/laravel-action-banner.png)

# laravel-action

[![Latest Stable Version](http://poser.pugx.org/visiarch/laravel-action/v)](https://packagist.org/packages/visiarch/laravel-action)
[![License](http://poser.pugx.org/visiarch/laravel-action/license)](https://packagist.org/packages/visiarch/laravel-action)

> A Simple Package to create actions, using artisan commands in laravel.

This package extends the `make:` commands to help you easily create action classes in Laravel 9+.

# What is Action ?

In Laravel, "Action" usually refers to the method inside the controller that handles the HTTP request. These actions determine how the application responds to specific requests to specific routes.

# Install

```bash
composer require visiarch/laravel-action
```

Once it is installed, you can use any of the commands in your terminal.

# Usage

Actions are used to group logic related to routes and HTTP requests. They handle application logic related to user interactions over HTTP.

```bash
php artisan make:action {name}
```

# Examples

## Create an action class

```bash
$ php artisan make:action CreateUser
```

`/app/Actions/CreateUser.php`

```php
<?php

namespace App\Actions;

/**
 * Class CreateUser
 * @package App\Actions
 */
class CreateUser
{
    /**
     * @return true
     */
    public function execute(){
        // write your code here
        return true;
    }
}
```
## Contributing

Please feel free to fork this package and contribute by submitting a pull request to enhance the functionalities.

## How can I thank you?

Why not star the github repo? I'd love the attention! Why not share the link for this repository on any social media? Spread the word!

Thanks!
visiarch

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
