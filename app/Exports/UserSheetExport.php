<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UserSheetExport implements WithTitle, WithHeadings, FromQuery, WithMapping, WithColumnWidths, ShouldAutoSize, WithStyles
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

    public function columnWidths(): array
    {
        return [
            'B' => 25
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // return [
        //     '1' => ["font" => ['bold' => true]]
        // ];

        $sheet->getStyle('1')->getFont()->setBold(true);
        $sheet->getStyle('B1:B'.$sheet->getHighestRow())->getAlignment()->setWrapText(true);
    }

    // /**
    //  * @return array|void
    //  */
    // public function defaultStyles(Style $defaultStyle)
    // {
    //     return [
    //         'font' => [
    //             'name' => 'Calibri',
    //             'size' => 11
    //         ],
    //         'alignment' => [
    //             'horizontal' => Style\Alignment::HORIZONTAL_CENTER,
    //             'vertical' => Style\Alignment::VERTICAL_CENTER
    //         ],
    //     ];
    // }
}
