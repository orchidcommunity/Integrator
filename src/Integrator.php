<?php

namespace Orchid\Integrator;

use Illuminate\Support\Str;

class Integrator
{

    /**
     * @var array
     */
    public $repository = [];

    /**
     * @var string
     */
    protected $namespace = 'App\\Admin\\';

    /**
     * Integrator constructor.
     */
    public function __construct()
    {
        $this->registerBinding();
    }

    /**
     * Register all repository
     *
     * @return Integrator
     */
    public function registerBinding() : Integrator
    {
        foreach (glob(app_path('Admin/*')) as $key => $class) {
            $class = self::after($class, 'Admin/');
            $class = self::before($class, '.php');
            $class = $this->namespace . $class;
            $this->repository[] = new $class();
        }

        return $this;
    }

    /**
     * @deprecated
     * @deprecated Laravel 5.5
     * @deprecated https://github.com/laravel/framework/issues/20125
     * Return the remainder of a string after a given value.
     *
     * @param  string $subject
     * @param  string $search
     * @param  bool   $before
     *
     * @return string
     */
    private static function after($subject, $search, $before = false) : string
    {
        if (Str::length($search) === 0) {
            return $subject;
        }
        $pos = strpos($subject, $search);
        if ($pos === false) {
            return $subject;
        }

        return $before
            ? substr($subject, 0, $pos)
            : substr($subject, $pos + strlen($search));
    }

    /**
     * @deprecated
     * @deprecated Laravel 5.5
     * @deprecated https://github.com/laravel/framework/issues/20125
     *
     * Return the string before the given value.
     *
     * @param  string $subject
     * @param  string $search
     *
     * @return string
     */
    private static function before($subject, $search) : string
    {
        return static::after($subject, $search, $before = true);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function map()
    {
        return response()->json($this->getRoute());
    }

    /**
     *
     * @return array
     */
    public function getRoute() : array
    {
        $routes = [];
        foreach ($this->repository as $repository) {

            $default = (array) $repository;
            $default['class'] = get_class($repository);
            $routes[] = $default;
        }

        return $routes;
    }
}
