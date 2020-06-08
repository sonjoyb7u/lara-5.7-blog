<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_tag_data = Tag::orderBy('id', 'desc')->latest()->get();
//        return $all_tag_data;
        return view('backend.admin.tag.index', compact('all_tag_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        try {
            $tag_name = $request->name;
            $tag_data = [
                'name' => $tag_name,
                'slug' => str_slug($tag_name),
            ];
            $create_tag = Tag::create($tag_data);
            if($create_tag) {
                getAlertMessage('success', 'Success, Tag Has Been Created/Added Successfully Done.');
                Toastr::success('Tag Has Been Created/Added Successfully Done.', 'Success');
                return redirect()->route('admin.tag.index');
            } else {
                getAlertMessage('danger', 'Error, Tag Has Not Been Created/Added.');
                Toastr::error('Tag Has Not Been Created/Added.', 'Error');
                return redirect()->route('admin.tag.create');
            }

        } catch (Exception $exception) {
//            dd($exception);
            getAlertMessage('danger', 'Error : ' . $exception->getMessage());
//            Toastr::error("'" . $exception->getMessage() . "'", 'Error');
            return redirect()->route('admin.tag.create');
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
    public function edit($id)
    {
        $id = base64_decode($id);
        $tag_data = Tag::find($id);
        return view('backend.admin.tag.edit', compact('tag_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $id = base64_decode($id);
        $tag_data = Tag::find($id);

        try {
            $tag_data->name = $request->name;
            $tag_data->slug = str_slug($request->name);
//            return $tag_data;
            $tag_update = $tag_data->update();
            if($tag_update) {
                getAlertMessage('success', 'Success, Tag Has Been Updated Successfully Done.');
                Toastr::success('Tag Has Been Updated Successfully Done.', 'Success');
                return redirect()->route('admin.tag.index');
            } else {
                getAlertMessage('danger', 'Error, Tag Has Not Been Updated.');
                Toastr::error('Tag Has Not Been Updated.', 'Error');
                return redirect()->route('admin.tag.edit');
            }

        } catch (Exception $exception) {
//            dd($exception);
            getAlertMessage('danger', 'Error : ' . $exception->getMessage());
//            Toastr::error($exception->getMessage(), 'Error');
            return redirect()->route('admin.tag.edit');
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
       $tag_data = Tag::find($id);
       $tag_delete = $tag_data->delete();
       if($tag_delete) {
            getAlertMessage('success', 'Success, Tag Has Been Deleted Successfully Done.');
            Toastr::success('Tag Has Been Deleted Successfully Done.', 'Success');
            return redirect()->route('admin.tag.index');
        } else {
            getAlertMessage('danger', 'Error, Tag Has Not Been Deleted.');
            Toastr::error('Tag Has Not Been Deleted.', 'Error');
            return redirect()->route('admin.tag.index');
        }

    }

    public function activeStatus($id) {
        $id = base64_decode($id);
        $tag_data = Tag::find($id);
        $activeStatus = 'active';
        $tag_data->status = $activeStatus;
        $active_status = $tag_data->save();
        if($active_status) {
            getAlertMessage('success', 'Success, Tag Status Has Been Activated Successfully Done.');
            Toastr::success('Tag Status Has Been Activated Successfully Done.', 'Success');
            return redirect()->route('admin.tag.index');
        } else {
            getAlertMessage('danger', 'Error, Tag Status Has Not Been Activated.');
            Toastr::error('Tag Status Has Not Been Activated.', 'Error');
            return redirect()->route('admin.tag.index');
        }

    }

    public function inactiveStatus($id) {
        $id = base64_decode($id);
        $tag_data = Tag::find($id);
        $inactiveStatus = 'inactive';
        $tag_data->status = $inactiveStatus;
        $inactive_status = $tag_data->save();
        if($inactive_status) {
            getAlertMessage('warning', 'Success, Tag Status Has Been De-activated Successfully Done.');
            Toastr::warning('Tag Status Has Been De-activated Successfully Done.', 'Success');
            return redirect()->route('admin.tag.index');

        } else {
            getAlertMessage('danger', 'Error, Tag Status Has Not Been De-activated.');
            Toastr::error('Tag Status Has Not Been De-activated.', 'Error');
            return redirect()->route('admin.tag.index');
        }

    }



}
