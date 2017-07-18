<?php

namespace Orchid\Integrator;

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
        if ($search == '') {
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
     *
     * @return array
     */
    public function getRoute() : array
    {
        $routes = [];
        foreach ($this->repository as $repository) {
            $routes[] = [
                'route' => $repository->route,
                'slug'  => $repository->slug,
                'class' => get_class($repository),
            ];
        }

        return $routes;
    }


}
