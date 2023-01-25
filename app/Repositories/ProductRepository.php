<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\ProductContract;
use App\Models\Product;

/**
 * Product Repository
 *
 * @package App\Repositories
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
final class ProductRepository extends Repository implements ProductContract
{
    /**
     * Product Model
     *
     * @var object
     */
    protected $model = Product::class;

    /**
     * Return all products
     *
     * @return object
     */
    public function productList(): object
    {
        return $this->model->simplePaginate(5);
    }

    /**
     * Return product data
     *
     * @param integer $productId
     * @return null|object
     */
    public function productFind(int $productId): ?object
    {
        return $this->model->find($productId);
    }

    /**
     * Create product and return last id
     *
     * @param array $productData
     * @return integer
     */
    public function productCreate(array $productData): int
    {
        return $this->model->create($productData)->id;
    }

    public function productUpdate(int $productId, array $productData)
    {
    }

    /**
     * Delete product if id exits
     *
     * @param integer $productId
     * @return boolean
     */
    public function productDestroy(int $productId): bool
    {
        return (bool) $this->model->destroy($productId);
    }
}
