<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Auth;
use App\Models\Blog;
use App\Models\BlogCategory;

class BlogController extends Controller {
    public function __construct() {
        return $this->middleware('auth')->only('create', 'update', 'delete');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = Blog::with(['category'])->where('status_id', 1)
            ->orderBy('created_at', 'DESC')->paginate(6);
        return view('front.blog.index', array('posts' => $posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $class = 'form-control';
        $categories = BlogCategory::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('front.blog.create', compact(
            'categories', 'class'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $slug = Str::slug($request->title);
        
        $data = $request->all();

        $data['category_id'] = (int)$request->category_id;
        $data['slug'] = $slug;
        $data['user_id'] = Auth::user()->id;

        Post::create($data);
        return redirect()->route('blog.index')->with('success', 'Artikel berhasil di submit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
        $post = Blog::where('slug', $slug)->first();
        if($post !== NULL) {
            return view('front.blog.show', compact('post'));
        }
        else {
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
