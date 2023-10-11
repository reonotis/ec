<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface OwnerRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getOwners(): Collection;

}
