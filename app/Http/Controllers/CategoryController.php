<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category as Obj;

class CategoryController extends Controller
{

    private $page = 'category';
    private $success = 'Success';
    private $failed = 'failed';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Obj::paginate(10);
        $no =1;
        return view($this->page.'/index',compact('data','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view($this->page.'/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $obj = new Obj;
        $obj->category = $request->category;
        $obj->slug = str_slug($request->category,'-').'-'.time();
        $save = $obj->save();

        if (!$save) {
            return redirect()->with('failed',$this->failed)->withInput();
        }
        return redirect($this->page)->with('success',$this->success);

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
        //
        $data = Obj::find($id);
        return view($this->page.'/edit',compact('data'));
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
        //

        $obj = Obj::find($id);
        $obj->category = str_slug($request->category,'-').'-'.time();
        $save = $obj->save();

        if (!$save) {
            return redirect()->back()->with('failed',$this->failed);
        }
        return redirect($this->page)->with('success',$this->success);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $obj = Obj::find($id);
        $delete = $obj->delete();
                if (!$delete) {
            return redirect()->back()->with('failed',$this->failed);
        }
        return redirect()->back()->with('success',$this->success);
    }
}
