<?php

namespace DestinyH\Http\Controllers;

use DestinyH\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
class GameController extends Controller
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
        $games = Game::OrderBy('id', 'desc')->paginate(5);
        return view('admin.views.game.list', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.game.create');
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
            "game_name" => "required|string|unique:games",
            "game_developer" => "required|string",
            "game_link" => "required|url",
            "game_trailer" => "required|url",
            "game_release" => "required|date",
            "image" => "required|image",
            "s_description" => "required|string",
            "b_description" => "required|string",
            "user_id" => "required|exists:users,id"
        ]);

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $path = date('Y/m/d/His'). '.' . $request->file('image')->getClientOriginalExtension();
                $request->image->storeAs('', $path);
            }
        }
        try {
            $game = new Game();
            $game->game_name = $request->game_name;
            $game->game_developer = $request->game_developer;
            $game->game_link = $request->game_link;
            if ($request->hasFile('image')) {
                if ($request->file('image')->isValid()) {
                    $game->game_img = url('/uploads') . '/' . $path;
                }
            }else{
                $game->game_img = url('/uploads') . '/game_default.jpg';
            }
            $game->game_trailer = $request->game_trailer;
            $game->game_release = $request->game_release;
            $game->game_description = $request->s_description;
            $game->game_big_description = $request->b_description;
            $game->game_karma = 0;
            $game->user_id = $request->user_id;
            $game->save();

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
        $game = Game::findBySlug($slug);
        return view('portal.views.game', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = Game::find($id);
        return view('admin.views.game.edit', compact('game'));
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
            "game_name" => "required|string",
            "game_developer" => "required|string",
            "game_link" => "required|url",
            "game_trailer" => "required|url",
            "image" => 'nullable|image',
            "game_release" => "required|date",
            "s_description" => "required|string",
            "b_description" => "required|string",
        ]);

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $path = date('Y/m/d/His'). '.' . $request->file('image')->getClientOriginalExtension();
                $request->image->storeAs('', $path);
            }
        }
        try {
            $game = Game::find($id);
            $game->game_name = $request->game_name;
            $game->game_developer = $request->game_developer;
            $game->game_link = $request->game_link;
            if ($request->hasFile('image')) {
                if ($request->file('image')->isValid()) {
                    $game->game_img = url('/uploads') . '/' . $path;
                }
            }
            $game->game_trailer = $request->game_trailer;
            $game->game_release = $request->game_release;
            $game->game_description = $request->s_description;
            $game->game_big_description = $request->b_description;
            $game->save();

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
            $game = Game::find($id);
            $game->delete();
        } catch (\Exception $e) {
            return response()->view('errors.500');
        }
        \Session::flash('deleted', 'succeed');
        return redirect()->back();
    }
    public function searchGame($title)
    {
        $search="%".$title."%";
        $game = DB::table('games')
                ->select('games.*')->where([
                      ['game_name', 'like', $search],
                  ])->get();
        return response()->json($game);
    }
}
