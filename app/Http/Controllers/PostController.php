<?php

namespace DestinyH\Http\Controllers;

use DestinyH\Game;
use Illuminate\Http\Request;
use DestinyH\Post;
use DestinyH\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::OrderBy('created_at', 'desc')->paginate(10);
        return view('admin.views.post.list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = Game::all();
        return view('admin.views.post.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "post_title" => "required|string",
            "game_id" => "required|exists:games,id",
            "image" => "required|image",
            "post_content" => "required|string",
            "user_id" => "required|exists:users,id",
        ]);

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $path = date('Y/m/d/His') . '.' . $request->file('image')->getClientOriginalExtension();
                $request->image->storeAs('', $path);
            }
        }
        try {
            $post = new Post();
            $post->post_title = $request->post_title;
            $post->post_content = $request->post_content;
            $post->post_tag = Game::where('id', $request->game_id)->first()->game_name;
            $post->post_karma = 0;
            $post->user_id = $request->user_id;
            $post->game_id = $request->game_id;
            if ($request->hasFile('image')) {
                if ($request->file('image')->isValid()) {
                    $post->post_img = url('/uploads') . '/' . $path;
                }
            } else {
                $post->post_img = url('/uploads') . '/post_default.jpg';
            }
            $post->save();
        } catch (\Exception $e) {
            return response()->view('errors.500');
        }
        $request->session()->flash('created', 'succeed');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::findBySlug($slug);
        $comments = $post->comments()->paginate(5);
        return view('portal.views.post', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $games = Game::all();
        return view('admin.views.post.edit',compact('post','games'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "post_title" => "required|string",
            "game_id" => "required|exists:games,id",
            "image" => "nullable|image",
            "post_content" => "required|string",
        ]);

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $path = date('Y/m/d/His') . '.' . $request->file('image')->getClientOriginalExtension();
                $request->image->storeAs('', $path);
            }
        }
        try {
            $post = Post::find($id);
            $post->post_title = $request->post_title;
            $post->post_content = $request->post_content;
            $post->post_tag = Game::where('id', $request->game_id)->first()->game_name;
            $post->game_id = $request->game_id;
            if ($request->hasFile('image')) {
                if ($request->file('image')->isValid()) {
                    $post->post_img = url('/uploads') . '/' . $path;
                }
            }
            $post->save();
        } catch (\Exception $e) {
            return response()->view('errors.500');
        }
        $request->session()->flash('updated', 'succeed');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
        $post = Post::find($id);
        $post->delete();
    } catch (\Exception $e) {
        return response()->view('errors.500');
    }
        \Session::flash('deleted', 'succeed');
        return redirect()->back();
    }
    public function searchPost($title)
    {
        $search="%".$title."%";
        $post = DB::table('posts')
                ->select('posts.*')->where([
                      ['post_title', 'like', $search],
                  ])->get();
        return response()->json($post);
    }
}
