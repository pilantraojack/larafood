<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    // pega as categorias pelo uuid do tenant, recebe uma string
    public function getCategoriesByTenantUuid(string $uuid);
    public function getCategoriesByTenantId(int $idTenant);
    public function getCategoryByUuid(string $uuid);
}
