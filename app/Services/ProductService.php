<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ProductContract;

/**
 * Product Service
 *
 * @package App\Services
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
final class ProductService
{
    public function __construct(private ProductContract $productContract)
    {
    }

    /**
     * List all products
     *
     * @return object
     */
    public function listProducts(): object
    {
        return $this->productContract->productList();
    }

    /**
     * Return product data if exits or null instead
     *
     * @param integer $productId
     * @return object|null
     */
    public function findProduct(int $productId): ?object
    {
        $result = $this->productContract->productFind($productId);
        return is_null($result) ? null : $result;
    }

    /**
     * Create new product
     *
     * @param array $productData
     * @return array
     */
    public function createProduct(array $productData): array
    {
        $result = $this->productContract->productCreate($productData);

        return is_integer($result) === true
            ? ['success' => "Produto {$productData['name']} cadastrado com sucesso!!"]
            : ['error'   => "Erro ao cadastrar o produto {$productData['name']}, tente novamente mais tarde!!"];
    }

    /**
     * Update Product
     *
     * @param integer $productId
     * @param array $productData
     * @return array
     */
    public function updateProduct(int $productId, array $productData): array
    {
        $result = $this->findProduct($productId);

        $result->fill($productData)->save();

        return $result instanceof \App\Models\Product
            ? ['success' => "Produto {$productData['name']} atualizado com sucesso"]
            : ['error'   => "Falha ao atualizar o produto {$productData['name']}, tente novamente mais tarde"];
    }

    /**
     * Delete product
     *
     * @param integer $productId
     * @return array
     */
    public function deleteProduct(int $productId): array
    {
        $productData = $this->findProduct($productId);
        $result = $this->productContract->productDestroy($productId);

        return $result === true
            ? ['success' => "Produto {$productData->name} deletado com sucesso"]
            : ['error' => "Erro ao deletar produto"];
    }
}
