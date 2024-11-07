<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class UsersExport implements WithMultipleSheets
{
    // use Exportable;
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }


    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];
        foreach($this->data as $user) {
            $sheets[] = new UserSheetExport($user);
        }
        return $sheets;
    }

}
