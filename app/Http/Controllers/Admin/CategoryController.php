<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
//use Image;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_category_data = Category::latest()->get();
        return view('backend.admin.category.index', compact('all_category_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            // Get Image from Form...
            $image = $request->file('image');
            $slug = str_slug($request->name);
            if(isset($image)) {
                if($request->hasFile('image')) {
                    // Create Unique Image Name...
                    $current_date = Carbon::now()->toDateString();
                    $new_image_name = $slug . '_' . $current_date . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
//                    return $new_image_name;
                    $image_type = $image->getClientMimeType();

                    if ($image->isValid()) {
                        if ($image_type === "image/jpeg" || $image_type === "image/png") {
                            $slider_path = public_path('storage/uploads/category/slider/').$new_image_name;
                            $banner_path = public_path('storage/uploads/category/banner/').$new_image_name;
//                            $slider_path = public_path('uploads/category/slider/'.$new_image_name);
//                            $banner_path = public_path('uploads/category/banner/'.$new_image_name);
                            // Check Dir of Category Slider is exists or Not...
                            if (!Storage::disk('public')->exists('uploads/category/slider')) {
                                Storage::disk('public')->makeDirectory('uploads/category/slider');
                            }
                            // Resize and Upload Category Slider Images...
                            $cat_slider_image = Image::make($image)
                                ->resize(360, 236)
                                ->save($slider_path);
//                            Storage::disk('public')->put('uploads/category/slider/'.$new_image_name, $cat_slider_image);

                            // Check Dir of Category Banner is exists or Not...
                            if (!Storage::disk('public')->exists('uploads/category/banner')) {
                                Storage::disk('public')->makeDirectory('uploads/category/banner');
                            }
                            // Resize and Upload Category Banner Images...
                            $cat_banner_image = Image::make($image)
                                ->resize(1140, 550)
                                ->save($banner_path);
//                            Storage::disk('public')->put('uploads/category/banner/'.$new_image_name, $cat_banner_image);

                        }

                    }

                }

            } else {
                $new_image_name = 'cat_image.png';
            }

            $category_data = [
                'name' => $request->name,
                'slug' => $slug,
                'image' => $new_image_name,
            ];
//            return $category_data;
            $create_category = Category::create($category_data);
            if($create_category) {
                getAlertMessage('success', 'Success, Category Has Been Created/Added Successfully Done.');
                Toastr::success('Category Has Been Created/Added Successfully Done.', 'Success');
                return redirect()->route('admin.category.index');
            } else {
                getAlertMessage('danger', 'Error, Category Has Not Been Created/Added.');
                Toastr::error('Category Has Not Been Created/Added.', 'Error');
                return redirect()->route('admin.category.create');
            }
        } catch (Exception $exception) {
            dd($exception);
            getAlertMessage('danger', 'Error : ' . $exception->getMessage());
//            Toastr::error($exception->getMessage(), 'Error');
            return redirect()->route('admin.category.create');
        }



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
    public function edit($slug)
    {
//        $id = base64_decode($id);
        $cat_data = Category::where('slug', $slug)->first();
//        return $cat_data;

        return view('backend.admin.category.edit', compact('cat_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $id = base64_decode($id);
        $old_cat_data = Category::find($id);
//        return $old_cat_data->image;
        try {
            // Get Image from Form...
            $image = $request->file('image');
            $slug = str_slug($request->name);
            if(isset($image)) {
                if($request->hasFile('image')) {
                    // Create Unique Image Name...
                    $current_date = Carbon::now()->toDateString();
                    $new_image_name = $slug . '_' . $current_date . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
//                    return $new_image_name;
                    $image_type = $image->getClientMimeType();

                    if ($image->isValid()) {
                        if ($image_type === "image/jpeg" || $image_type === "image/png") {
                            $slider_path = public_path('storage/uploads/category/slider/').$new_image_name;
                            $banner_path = public_path('storage/uploads/category/banner/').$new_image_name;
//                            $slider_path = public_path('uploads/category/slider/'.$new_image_name);
//                            $banner_path = public_path('uploads/category/banner/'.$new_image_name);

                            // Check Dir of Category Slider is exists or Not...
                            if (!Storage::disk('public')->exists('uploads/category/slider')) {
                                Storage::disk('public')->makeDirectory('uploads/category/slider');
                            }
                            // Delete Old Slider folder Image...
                            if(Storage::disk('public')->exists('uploads/category/slider/'.$old_cat_data->image)) {
                                Storage::disk('public')->delete('uploads/category/slider/'.$old_cat_data->image);
                            }
                            // Resize and Upload Category Slider Images...
                            $cat_slider_image = Image::make($image)
                                ->resize(360, 236)
                                ->save($slider_path);
//                            Storage::disk('public')->put('uploads/category/slider/'.$new_image_name, $cat_slider_image);

                            // Check Dir of Category Banner is exists or Not...
                            if (!Storage::disk('public')->exists('uploads/category/banner')) {
                                Storage::disk('public')->makeDirectory('uploads/category/banner');
                            }
                            // Delete Old Banner folder Image...
                            if(Storage::disk('public')->exists('uploads/category/banner/'.$old_cat_data->image)) {
                                Storage::disk('public')->delete('uploads/category/banner/'.$old_cat_data->image);
                            }
                            // Resize and Upload Category Banner Images...
                            $cat_banner_image = Image::make($image)
                                ->resize(1140, 550)
                                ->save($banner_path);
//                            Storage::disk('public')->put('uploads/category/banner/'.$new_image_name, $cat_banner_image);

                        }

                    }

                }

            } else {
                $new_image_name = $old_cat_data->image;
            }

            $old_cat_data->name = $request->name;
            $old_cat_data->slug = $slug;
            $old_cat_data->image = $new_image_name;

            $update_category = $old_cat_data->save();
            if($update_category) {
                getAlertMessage('success', 'Success, Category Has Been Updated Successfully Done.');
                Toastr::success('Category Has Been Updated Successfully Done.', 'Success');
                return redirect()->route('admin.category.index');
            } else {
                getAlertMessage('danger', 'Error, Category Has Not Been Updated.');
                Toastr::error('Category Has Not Been Updated.', 'Error');
                return redirect()->route('admin.category.edit');
            }
        } catch (Exception $exception) {
//            dd($exception);
            getAlertMessage('danger', 'Error : ' . $exception->getMessage());
//            Toastr::error($exception->getMessage(), 'Error');
            return redirect()->route('admin.category.edit');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = base64_decode($id);
        $old_cat_data = Category::find($id);
        // Delete Old Slider folder Image...
        if(Storage::disk('public')->exists('uploads/category/slider/'.$old_cat_data->image)) {
            Storage::disk('public')->delete('uploads/category/slider/'.$old_cat_data->image);
        }
        // Delete Old Banner folder Image...
        if(Storage::disk('public')->exists('uploads/category/banner/'.$old_cat_data->image)) {
            Storage::disk('public')->delete('uploads/category/banner/'.$old_cat_data->image);
        }
        $old_cat_delete = $old_cat_data->delete();
        if($old_cat_delete) {
            getAlertMessage('success', 'Success, Category Has Been Deleted Successfully Done.');
            Toastr::success('Category Has Been Deleted Successfully Done.', 'Success');
            return redirect()->route('admin.category.index');
        } else {
            getAlertMessage('danger', 'Error, Category Has Not Been Deleted.');
            Toastr::error('Category Has Not Been Deleted.', 'Error');
            return redirect()->route('admin.category.index');
        }
    }

    public function activeStatus($id) {
        $id = base64_decode($id);
        $tag_data = Category::find($id);
        $activeStatus = 'active';
        $tag_data->status = $activeStatus;
        $active_status = $tag_data->save();
        if($active_status) {
            getAlertMessage('success', 'Success, Category Status Has Been Activated Successfully Done.');
            Toastr::success('Category Status Has Been Activated Successfully Done.', 'Success');
            return redirect()->route('admin.category.index');
        } else {
            getAlertMessage('danger', 'Error, Category Status Has Not Been Activated.');
            Toastr::error('Category Status Has Not Been Activated.', 'Error');
            return redirect()->route('admin.category.index');
        }

    }

    public function inactiveStatus($id) {
        $id = base64_decode($id);
        $tag_data = Category::find($id);
        $inactiveStatus = 'inactive';
        $tag_data->status = $inactiveStatus;
        $inactive_status = $tag_data->save();
        if($inactive_status) {
            getAlertMessage('warning', 'Success, Category Status Has Been De-activated Successfully Done.');
            Toastr::warning('Category Status Has Been De-activated Successfully Done.', 'Success');
            return redirect()->route('admin.category.index');

        } else {
            getAlertMessage('danger', 'Error, Category Status Has Not Been De-activated.');
            Toastr::error('Category Status Has Not Been De-activated.', 'Error');
            return redirect()->route('admin.category.index');
        }

    }
}
