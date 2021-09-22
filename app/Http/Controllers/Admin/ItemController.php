<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Item;
use Image;
use File;

class ItemController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('id', 'desc')->get();
        return view('admin.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ],
            [
                'name.required' => 'Please write your name!',
                'category_id.required' => 'Please select your category!',
                'price.required' => 'Enter your price!',
                'image.required' => 'Provide a valid image please!',
            ]
        );

        $item = new Item();
        $item->name = $request->name;
        $item->category_id = $request->category_id;
        $item->price = $request->price;
        $item->description = $request->description;

        if($request->hasFile('image')){
            $images = $request->file('image');
            $img = time().'.'.$images->getClientOriginalExtension();
            $destination = public_path('uploads/item/'.$img);
            Image::make($images)->resize(369, 300)->save($destination);
        }

        $item->image = $img;
        $item->save();

        $notify = array('messege' => 'Item Added Successfully!!', 'alert-type' => 'success');
        return redirect()->route('item.index')->with($notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.item.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ],
            [
                'name.required' => 'Please write your name!',
                'category_id.required' => 'Please select your category!',
                'price.required' => 'Enter your price!',
            ]
        );

        $item = Item::find($id);

        $item->name = $request->name;
        $item->category_id = $request->category_id;
        $item->price = $request->price;
        $item->description = $request->description;

        if($request->hasFile('image')){

            if(File::exists('uploads/item/'.$item->image)){
                File::delete('uploads/item/'.$item->image);
            }

            $images = $request->file('image');
            $img = time().'.'.$images->getClientOriginalExtension();
            $destination = public_path('uploads/item/'.$img);
            Image::make($images)->resize(369, 300)->save($destination);

            $item->image = $img;
        }

        
        $item->save();

        $notify = array('messege' => 'Item Updated Successfully!!', 'alert-type' => 'success');
        return redirect()->route('item.index')->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        if(!is_null($item)){
            if(File::exists('uploads/item/'.$item->image)){
                File::delete('uploads/item/'.$item->image);
            }

            $item->delete();
        }

        $notify = array('messege' => 'Item Deleted Successfully', 'alert-type' => 'success');
        return redirect()->route('item.index')->with($notify);
    }
}
