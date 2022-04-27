<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use Brian2694\Toastr\Facades\Toastr;


class CategoryController extends Controller
{
     //showing Category  List

     public function showcategory()
     {

        $category=Category::all();

       return view('admin.pages.category.list',compact('category'));

      }

     //Creating Category through Form
     public function creatcategory()
     {
       return view('admin.pages.category.create');
      }

      //storing Category Data through Form
     public function storecategory(Request $request)
     {

        {
            $request->validate([
              'name'=>'required',
              'details'=>'required',
            ]);

        Category::create([
             'name'=>$request->name,
             'details'=>$request->details,
         ]);

        //  Toastr::success('Category Created Successfully', 'success');

         return redirect()->route('show.category')->with('success','Category  has been created successfully.');

        }

      }

       //View Category
      public function Viewcategory($id)
      {
          $category=Category::find($id);

          return view('admin.pages.category.view', compact('category'));

      }

       //Update Category
      public function editcategory($categoryr_id)
      {
          $category=Category::find($categoryr_id);

          return view('admin.pages.category.edit',compact('category'));

      }
      public function Updatecategory(Request $request,$categoryr_id)
      {


          $category=Category::find($categoryr_id);
          $category->update([

             'name'=>$request->name,
             'details'=>$request->details,
         ]);

        //  Toastr::success('Category Updated Successfully', 'success');


         return redirect()->route('show.category');

      }

      //Delete Category
      public function Deletecategory($id)
      {
        Category::find($id)->delete();

        // Toastr::error('Category Deleted Successfully');


          return redirect()->back();
      }




}
