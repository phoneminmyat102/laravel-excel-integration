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
        return Excel::download(new UsersExport($users), 'users.xlsx');
        // return (new UsersExport($users))->store('users2.xlsx');
    }
}
