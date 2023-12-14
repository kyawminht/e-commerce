<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders=Slider::orderBy('id')->paginate(5);
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $validatedData=$request->validated();
        if ($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('uploads/slider/',$filename);
            $validatedData['image']='uploads/slider/'.$filename;
        }

        $validatedData['status']=$request->status == true ? '1':'0';

        Slider::create([
            'title'=>$validatedData['title'],
            'description'=>$validatedData['description'],
            'image'=>$validatedData['image'],
            'status'=>$validatedData['status'],

        ]);

        return redirect('admin/slider')->with('message','Slider created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {

        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $oldImage = $slider->image;

            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] = 'uploads/slider/'.$filename;
        }

        $validatedData['status'] = $request->status == true ? '1' : '0';

        Slider::where('id',$slider->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/slider')->with('message', 'Slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if ($slider->count() > 0){
        $oldImage=$slider->image;
        if (File::exists($oldImage)){
            File::delete($oldImage);
        }

        $slider->delete();
            return redirect('admin/slider')->with('message','Slider deleted successfully');

        }
    }
}
