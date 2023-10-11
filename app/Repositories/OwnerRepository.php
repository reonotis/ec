<?php

namespace App\Repositories;

use App\Models\Owner;
use Illuminate\Database\Eloquent\Collection;

/**
 * オーナーに対するレポジトリクラスです
 */
class OwnerRepository implements OwnerRepositoryInterface
{
    /**
     * 全てのオーナーを取得する
     * @return Collection<Owner>
     * @see OwnerRepositoryInterface::getOwners
     */
    public function getOwners(): Collection
    {
        return Owner::get();
    }

    /**
     * @param array $array_where
     * @return Collection<Owner>
     * @see OwnerRepositoryInterface::getOwners
     */
    public function getOwnersByParam(array $array_where): Collection
    {
        $query = Owner::select('*'); // TODO
        if(isset($array_where['name'])) {
            $query = $this->setWhereLike($query, 'name', $array_where['name']);
        }
        if(isset($array_where['email'])) {
            $query = $this->setWhereLike($query, 'email', $array_where['email']);
        }

        return $query->get();
    }

    /**
     * @param object $query
     * @param string $columName
     * @param string $values
     * @return object
     */
    private function setWhereLike(object $query, string $columName, string $values): object
    {
        // 全角スペースを半角スペースに変換
        $HANKAKUValues = mb_convert_kana($values, 's');

        // 半角スペース区切りで配列にする
        $valueArray = explode (' ' , $HANKAKUValues);

        foreach($valueArray AS $value){
            $query = $query->where($columName, 'LIKE', '%' . $value . '%');
        }
        return $query;
    }
    /**
     * オーナーを登録する
     * @param array $param
     * @return mixed
     */
    public function insert(array $param)
    {
        return Owner::create($param);
    }
}
