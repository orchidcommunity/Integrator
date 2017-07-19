<?php

namespace Orchid\Integrator\Repository;

abstract class BaseAdminRepository
{
    /**
     * @var string
     */
    public $name = 'Demo';

    /**
     * @var string
     */
    public $description = 'Demo';

    /**
     * @var string
     */
    public $icon = 'fa fa-archive';

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
    protected function response(array $data)
    {
        $default = (array) $this;
        $default['behaviors'] = $this->fields();
        $default['data'] = $data;

        return response()->json($default);
    }

}
