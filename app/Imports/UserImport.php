<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;
use Maatwebsite\Excel\Concerns\WithUpserts;

class UserImport implements ToModel, WithUpserts, WithUpsertColumns
{
    /**
     * @param  array  $row
     * @return Model|Model[]|null
     */
    public function model(array $row) {
        return new User([
            'name' => $row[0],
            'email' => $row[1],
            'password' => Hash::make($row['2']),
            'phone_no' => $row['3'],
            'address' => $row['4']
        ]);
    }

    public function uniqueBy()
    {
        return 'email';
    }

    public function upsertColumns()
    {
        return ['name'];  #only update name column when duplicate 
    }
}
