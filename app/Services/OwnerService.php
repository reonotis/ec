<?php

namespace App\Services;

use App\Models\Owner;
use App\Repositories\OwnerRepository;
use Illuminate\Database\Eloquent\Collection;

class OwnerService
{
    /** @var OwnerRepository $ownerRepository */
    private OwnerRepository $ownerRepository;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->ownerRepository = app(OwnerRepository::class);
    }

    /**
     * 全てのオーナーを取得する
     * @return Collection<Owner>
     */
    public function getOwners(): Collection
    {
        return $this->ownerRepository->getOwners();
    }

    /**
     * 全てのオーナーを取得する
     * @return Collection<Owner>
     */
    public function getOwnersByParam(array $array_where): Collection
    {
        return $this->ownerRepository->getOwnersByParam($array_where);
    }

    /**
     * @param array $param
     * @return mixed
     */
    public function insert(array $param)
    {
        return $this->ownerRepository->insert($param);
    }


}
