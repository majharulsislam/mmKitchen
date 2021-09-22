<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use Image;
use DB;
use File;

class SliderController extends Controller
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
        $sliders = Slider::orderBy('id','desc')->get();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'title' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ],
            [
                'title.required' => 'Please write your title',
                'image.required' => 'Please provide a valid image.such as jpg,jpeg,png,gif etc',
            ]
        );

        // image check
        if($request->hasFile('image')){
            $images = $request->file('image');
            $img = time().'.'.$images->getClientOriginalExtension();
            $destination = public_path('uploads/slider/'.$img);
            Image::make($images)->resize(1100, 550)->save($destination);
        }

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->image = $img;
        $slider->save();

        $notify = array('messege' => 'Slider Added Successfully!!', 'alert-type' => 'success');
        return redirect()->route('slider.index')->with($notify);


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
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
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
            'title' => 'required',        ],
            [
                'title.required' => 'Please write your title',
            ]
        );

        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;

        if($request->hasFile('image')){
            if(File::exists('uploads/slider/'.$slider->image)){
                File::delete('uploads/slider/'.$slider->image);
            }
            

            $images = $request->file('image');
            $img = time().'.'.$images->getClientOriginalExtension();
            $destination = public_path('uploads/slider/'.$img);
            Image::make($images)->resize(1100,550)->save($destination);

            $slider->image = $img;
        }

        $slider->save();

        $notify = array('messege' => 'Your Slider Updated Successfully!!', 'alert-type' => 'success');
        return redirect()->route('slider.index')->with($notify);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);

        if(!is_null($slider)){

            if(File::exists('uploads/slider/'.$slider->image)){
                File::delete('uploads/slider/'.$slider->image);
            }

            $slider->delete();
        }

        $notify = array('messege' => 'Your Slider Deleted!!', 'alert-type' => 'success');
        return back()->with($notify);
    }
}
