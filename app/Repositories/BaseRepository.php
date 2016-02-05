<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

trait BaseRepository
{
    /**
     * Get number of records.
     *
     * @return array
     */
    public function getNumber()
    {
        $total = $this->model->count();

        $new = $this->model->whereSeen(0)->count();

        return compact('total', 'new');
    }

    /**
     * Destroy a model.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        $this->getById($id)->delete();
    }

    /**
     * Get Model by id.
     *
     * @param int $id
     *
     * @return Collection
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Get paginated list.
     *
     * @param     $where
     * @param int $rows
     *
     * @return Collection
     */
    public function getPaginationList($where, $rows = 15)
    {
        return $this->model->where($where)->paginate($rows);
    }
}
