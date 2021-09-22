<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

use Toastr;

class ReservationController extends Controller
{
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'datetime' => 'required',
        ],
            [
                'name.required' => 'Please enter your name.',
                'email.required' => 'Please provide your valid email.',
                'phone.required' => 'Fillup your phone number.',
                'datetime.required' => 'Enter your reserve date & time.',
            ]
        );


        $reserve = new Reservation();
        $reserve->name = $request->name;
        $reserve->phone = $request->phone;
        $reserve->email = $request->email;
        $reserve->datetime = $request->datetime;
        $reserve->description = $request->description;
        $reserve->status = false;
        $reserve->save();

        Toastr::success('Reservation added successfully!', 'Reservation', ["positionClass" => "toast-top-right"]);
        return back();
    }

}
