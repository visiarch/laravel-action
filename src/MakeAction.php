<?php

namespace Visiarch\ActionServiceTrait;

use Illuminate\Console\GeneratorCommand;

/**
 * This file is part of the Laravel Action package.
 *
 * @author Gusti Bagus Suandana <visiarch@gmail.com> (C)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class MakeAction extends GeneratorCommand
{
    /**
     * The path to the stub file.
     */
    const STUB_PATH = __DIR__.'/Stubs/';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:action {name : Create an action class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new action class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Action';

    /**
     * Get the stub file path.
     *
     * @return string
     */
    protected function getStub()
    {
        return self::STUB_PATH.'action.stub';
    }

    /**
     * Execute the console command.
     *
     * @return bool|null
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     *
     * @see \Illuminate\Console\GeneratorCommand
     */
    public function handle()
    {
        // Check if the name is reserved by PHP
        if ($this->isReservedName($this->getNameInput())) {
            $this->error('The name "'.$this->getNameInput().'" is reserved by PHP.');

            return false;
        }

        // Get the fully qualified class name
        $name = $this->qualifyClass($this->getNameInput());

        // Get the path where the class will be created
        $path = $this->getPath($name);

        // Check if the class already exists and if the force option is set
        if ((! $this->hasOption('force') ||
                ! $this->option('force')) &&
            $this->alreadyExists($this->getNameInput())
        ) {
            $this->error($this->type.' already exists!');

            return false;
        }

        // Create the directory if it doesn't exist
        $this->makeDirectory($path);

        // Build the class with the given name and write it to the file
        $this->files->put(
            $path,
            $this->sortImports(
                $this->buildServiceClass($name)
            )
        );
        $message = $this->type;

        // Display a success message
        $this->info($message.' created successfully.');
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name  The name of the class
     * @return string The built class
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildServiceClass(string $name): string
    {
        // Get the stub file content
        $stub = $this->files->get(
            $this->getStub()
        );

        // Replace the namespace and class name in the stub
        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace  The root namespace
     * @return string The default namespace
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Actions';
    }
}
