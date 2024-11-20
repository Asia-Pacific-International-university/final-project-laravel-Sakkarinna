<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;

class TestController extends Controller
{
    public function users_list(Request $request){

        if($request->ajax()){
            $data = User::query();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('user_list');
    }
}
