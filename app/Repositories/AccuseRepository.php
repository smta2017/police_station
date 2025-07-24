<?php

namespace App\Repositories;

use App\Models\Accuse;
use App\Repositories\BaseRepository;

class AccuseRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'created_at',
        'updated_at'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Accuse::class;
    }
}
