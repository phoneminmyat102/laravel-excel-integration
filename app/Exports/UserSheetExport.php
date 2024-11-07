<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class UserSheetExport implements WithTitle, WithHeadings, FromQuery, WithMapping
{
    protected $user;

    public function __construct($data)
    {
        $this->user = $data;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->user->name;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            '#',
            'Notes',
            'Status',
            'Amount'
        ];
    }

    /**
     * @return Builder|EloquentBuilder|Relation|ScoutBuilder
     */
    public function query()
    {
        return Order::where('user_id', $this->user->id);
    }

    /**
     * @param  mixed  $row
     * @return array
     */
    public function map($row): array
    {
        return [
            $row['id'],
            $row['notes'],
            $row['status'],
            $row['amount'],            
        ];
    }
}
