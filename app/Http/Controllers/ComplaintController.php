<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaint;
use App\Category;
use Illuminate\Support\Facades\DB;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::orderBy('created_at','desc')->paginate(20);
        return view('complaints.view',compact('complaints'));
    }
    public function show($id)
    {
        $complaint = Complaint::findOrFail($id);
        $category_id = $complaint->category_id;
        $category = Category::where('id',$category_id)->get();
        return view('complaints.show',compact('complaint','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('complaints.update',compact('complaint'));
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
        $complaint = Complaint::findOrFail($id);
        $complaint->location = $request->location;
        $complaint->description = $request->description;
        $complaint->complaint_status_id = $request->complaint_status_id;
        $complaint->save();
        return redirect('/complaints');
    }

}
