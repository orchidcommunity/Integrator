<?php

namespace Orchid\Integrator\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeAdminForm extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:admin-form';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin form class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Admin-form';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub() : string
    {
        return __DIR__ . '/../stubs/admin-form.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace) : string
    {
        return $rootNamespace . '\Admin';
    }
}
