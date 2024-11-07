<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromArray, WithHeadings
{

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }



    /**
     * @return array
     */
    public function headings(): array
    {
        // return [
        //     '#',
        //     'Name',
        //     'Email',
        //     'Address',
        //     'Phone Number'
        // ];
        
        $headings = [];
        foreach($this->data->toArray()[0] as $key => $value) {
            $headings[] = User::Headings[$key];
        }
        return $headings;
    }

    /**
     * @return array
     */
    public function array(): array 
    {
        return $this->data->toArray();
    }

    
}
