<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $pages = Page::all();
        return view('page.index')->withPages($pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_name' => ['required', 'string', 'max:255', 'unique:pages'],
            'page_sort_order' => ['required', 'numeric'],
            'page_url' => ['required', 'string']
        ]);

        $postData = new Page([
            'page_name' => $request->get('page_name'),
            'page_sort_order' => $request->get('page_sort_order'),
            'page_keywords' => $request->get('page_keywords'),
            'page_description' => $request->get('page_description'),
            'page_url' => $request->get('page_url'),
        ]);
        $postData->save();

        return redirect('/page-configuration')->with('success', 'Page created successfully');
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
        $page = Page::find($id);
        if ($page) {
            return view('page.edit')->withPage($page);
        }
        abort(404);
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
        $request->validate([
            'page_name' => ['required', 'string', 'max:255', 'unique:pages,page_name,'.$id],
            'page_sort_order' => ['required', 'numeric'],
            'page_url' => ['required', 'string']
        ]);

        $page = Page::find($id);
        if ($page) {
            $page->page_name =  $request->get('page_name');
            $page->page_sort_order = $request->get('page_sort_order');
            $page->page_keywords = $request->get('page_keywords');
            $page->page_description = $request->get('page_description');
            $page->page_url = $request->get('page_url');
            $page->save();

            return redirect('/page-configuration')->with('success', 'Page updated successfully');
        }
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        if ($page) {
            $page->delete();
            return redirect('/page-configuration')->with('success', 'Page deleted successfully');
        }
        abort(404);
    }
}
