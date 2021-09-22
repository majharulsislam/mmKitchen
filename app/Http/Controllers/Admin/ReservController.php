<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Reservation;

class ReservController extends Controller
{
   
   public function __construct()
   {
        $this->middleware('auth');
    }


   public function index()
   {
     $reservations = Reservation::orderBy('id', 'desc')->get();
     return view('admin.reservation.reserv', compact('reservations'));
   }

   public function status($id)
   {
      $reservation = Reservation::find($id);
      $reservation->status = true;
      $reservation->save();

      $notify = array('messege' => 'Reservation Confirmed!', 'alert-type' => 'success');
      return redirect()->back()->with($notify);
   }

   public function destroy($id)
   {
      $destroy = Reservation::find($id);
      
      if(!is_null($destroy)){
         $destroy->delete();
      }

      $notify = array('messege' => 'Reservation Deleted Success!', 'alert-type' => 'success');
      return redirect()->back()->with($notify);   
   }

}
