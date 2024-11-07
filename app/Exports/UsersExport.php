<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Illuminate\Support\Facades\Redis;

class UsersExport implements WithMultipleSheets, ShouldQueue
{
    // use Exportable;
    use Queueable;
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
