<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article as Obj;
use App\Category;
class ArticleController extends Controller
{
    private $page = 'articles';
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
        $categories = Category::all();
        return view($this->page.'/create',compact('categories'));
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

        $extension = $request->photo->getClientOriginalExtension();
        $photo = time().'.'.$extension;
        $request->file('photo')->move("uploads/",$photo);


        $obj = new Obj;
        $obj->title = $request->title;
        $obj->slug = str_slug($request->title,'-').'-'.time();
        $obj->photo = $photo;
        $obj->content = $request->content;
        $obj->category_id = $request->category;
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
        $data = Obj::find($id);

        return view($this->page.'/detail',compact('data'));
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
        $categories = Category::all();
        return view($this->page.'/edit',compact('data','categories'));
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
        $obj->title = $request->title;
        $obj->slug = str_slug($request->title,'-').'-'.time();
        if (!is_null($request->photo)) {

        $extension = $request->photo->getClientOriginalExtension();
        $photo = time().'.'.$extension;
        $request->file('photo')->move("uploads/",$photo);
        $obj->photo = $photo;
        }
        $obj->content = $request->content;
        $obj->category_id = $request->category;
        $save = $obj->save();

        if (!$save) {
            return redirect()->with('failed',$this->failed)->withInput();
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
