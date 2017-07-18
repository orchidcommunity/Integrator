<?php

namespace Orchid\Integrator\Repository;

abstract class BaseAdminRepository
{

    /**
     * @var string
     */
    public $route = 'user';

    /**
     * @var string
     */
    public $slug = 'id';

    /**
     * Response data
     *
     * @param array $data
     *
     * @return array
     */
    protected function response(array $data) : array
    {
        return [
            'route'     => $this->route,
            'slug'      => $this->slug,
            'behaviors' => $this->fields(),
            'data'      => $data,
        ];
    }

}
