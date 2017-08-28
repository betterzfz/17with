<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Http\Requests\Admin\Category as CategoryRequest;

class CategoryController extends Controller
{
    public $fields = [
        'name' => '',
        'sort' => '255',
    ];
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index', ['categories' => Category::orderBy('sort')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $value) {
            $data[$field] = old($field, $value);
        }
        return view('admin.category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\Category  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        foreach ($this->fields as $field => $value) {
            $category->$field = $request->get($field);
        }
        if ($category->save()) {
            return redirect('/admin/category')->withSuccess('添加分类成功！');
        } else {
            return back()->withErrors('添加分类失败！');
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
        $category = Category::find($id);
        $data = ['id' => $id];
        foreach ($this->fields as $field => $value) {
            $data[$field] = $category->$field;
        }
        return view('admin.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\Category  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        foreach ($this->fields as $field => $value) {
            $category->$field = $request->get($field);
        }
        if ($category->save()) {
            return redirect('/admin/category')->withSuccess('修改分类成功！');
        } else {
            return back()->withErrors('修改分类失败！');
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
        //
    }
}
