<?php

declare(strict_types=1);

namespace App\Contracts;

/**
 * Product Contract
 *
 * @package App\Contracts
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
interface ProductContract
{
    /**
     * Product list
     *
     * @return object
     */
    public function productList(): object;

    /**
     * Find product by id
     *
     * @param integer $productId
     * @return ?object
     */
    public function productFind(int $productId): ?object;

    /**
     * Create new product and return id
     *
     * @param array $productData
     * @return int
     */
    public function productCreate(array $productData): int;

    /**
     * Update product
     *
     * @param integer $productId
     * @param array $productData
     * @return void
     */
    public function productUpdate(int $productId, array $productData);

    /**
     * Delete product
     *
     * @param integer $productId
     * @return boolean
     */
    public function productDestroy(int $productId): bool;
}
