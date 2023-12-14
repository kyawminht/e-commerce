<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Psy\Util\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {


        $validatedData = $request->validated();
        $category=new Category();
        $category->name=$validatedData['name'];
        $category->slug=\Illuminate\Support\Str::slug($validatedData['slug']);
        $category->description=$validatedData['description'];
        $category->meta_title=$validatedData['meta_title'];
        $category->meta_keyword=$validatedData['meta_keyword'];
        $category->meta_description=$validatedData['meta_description'];
        $category->status=$request->status == true ? '1' : '0';

        $uploadPath='uploads/category/';
        if ($request->hasFile('image')){

            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('uploads/category/', $fileName);
            $category->image =  $uploadPath.$fileName;

        }

        $category->save();

       return redirect('admin/category')->with('message','Category added successfully');

    }
    public function edit(Category $category)
    {
        return view('admin.category.edit',['category'=>$category]);
    }

    public function update(CategoryRequest $request,$category)
    {
        $validatedData = $request->validated();
        $category=Category::findOrFail($category);
        $category->name=$validatedData['name'];
        $category->slug=\Illuminate\Support\Str::slug($validatedData['slug']);
        $category->description=$validatedData['description'];
        $category->meta_title=$validatedData['meta_title'];
        $category->meta_keyword=$validatedData['meta_keyword'];
        $category->meta_description=$validatedData['meta_description'];
        $category->status=$request->status == true ? '1' : '0';

        if ($request->hasFile('image')){
            //delete old image
            $path='uploads/category'.$category->image;
            if (File::exists($path)){
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('uploads/category', $fileName);
            $category->image =  $fileName;

        }

        $category->save();

        return redirect('admin/category')->with('message','Category updated successfully');

    }
}
