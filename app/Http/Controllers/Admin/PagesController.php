<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use App\Models\Category;
use App\Models\Item;
use App\Models\Contact;
use App\Models\Reservation;
use Auth;

class PagesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::count();
        $item = Item::count();
        $slider = Slider::count();
        $contact = Contact::count();
        $reservations = Reservation::where('status', false)->get();
        return view('admin.index', compact('category', 'item', 'slider', 'reservations', 'contact'));
    }

}
