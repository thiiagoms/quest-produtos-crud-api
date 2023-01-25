<?php

declare(strict_types=1);

namespace App\Repositories;

/**
 * Default Repository
 *
 * @package App\Repositories
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
abstract class Repository
{
    protected $model;

    /**
     * Model injection
     *
     * @return mixed
     */
    private function handler(): mixed
    {
        return app($this->model);
    }

    public function __construct()
    {
        $this->model = $this->handler();
    }
}
