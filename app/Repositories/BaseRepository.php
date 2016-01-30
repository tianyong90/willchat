<?php

namespace App\Repositories;

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
     * @return App\Models\Model
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }
}
