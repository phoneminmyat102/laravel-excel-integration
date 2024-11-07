<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ExportsController extends Controller
{
    public function export() 
    {
        // $orders = Order::all();
        $users = User::all();
        Excel::store(new UsersExport($users), 'users12.xlsx');
        return "The exporting has started.";
        // return (new UsersExport($users))->store('users2.xlsx');
    }
}
