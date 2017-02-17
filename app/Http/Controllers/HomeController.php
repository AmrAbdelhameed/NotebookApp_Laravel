<?php

namespace App\Http\Controllers;

use App\Note;
use App\User;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
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

    public function index()
    {
        $user_data = Note::where('user_id', '=', Auth::user()->id)->get();
        return view('home', compact('user_data'));
    }

    public function insert_post(Request $request)
    {
        $content = $request->input('content');
        $check_data = Note::where('content', '=', $content)->get();
        if (count($check_data) > 0) {
            echo "Failed Wrong Data Passed";
        } else {
            $user_id = Auth::user()->id;
            $note = new Note;
            $note->content = $content;
            $note->user_id = $user_id;
            $note->save();
            return redirect('home');
        }
    }

    public function edit($id)
    {
        $notes = Note::where('id', '=', $id)->get();
        return view('edit', compact('notes'));
    }

    public function update(Request $request, $id)
    {
        $content = $request->input('content');

        Note::where('id', $id)
            ->update(['content' => $content]);

        return redirect('home');
    }

    public function delete_post($id)
    {
        $note = Note::find($id);
        $note->delete();
        return redirect('home');
    }

    public function show_details($id)
    {
        $notes = Note::where('id', '=', $id)->get();
        return view('Notes.show', compact('notes'));
    }

    public function profile_data($name)
    {
        $notes = User::where('name', '=', $name)->get();
        return view('profile', compact('notes'));
    }
}
