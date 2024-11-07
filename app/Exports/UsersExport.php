<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class UsersExport implements FromView
{

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return User::all();
    // }

    // /**
    //  * @return array
    //  */
    // public function array(): array 
    // {
    //     return $this->data->toArray();
    // }

    // /**
    //  * @return Builder|EloquentBuilder|Relation|ScoutBuilder
    //  */
    // public function query()
    // {
    //     return Order::where('amount', '>', 50);
    // }


    /**
     * @return View
     */
    public function view(): View
    {
        return view('orders', [
            'data' => $this->data
        ]);
    }
}
