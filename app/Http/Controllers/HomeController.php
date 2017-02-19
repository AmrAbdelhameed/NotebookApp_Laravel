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
        $user_account = Auth::user();

        $user_data = $user_account->notes;

        return view('home', compact('user_data'));
    }

    public function insert_post(Request $request)
    {
        $content = $request->input('content');
        $user_id = Auth::user()->id;

        $note = new Note;
        $note->content = $content;
        $note->user_id = $user_id;
        $note->save();

        return redirect('home');
    }

    public function edit($id)
    {
        $notes = Auth::user()->notes->find($id);

        return view('edit', compact('notes'));
    }

    public function update(Request $request, $id)
    {
        $content = $request->input('content');

        $notes = Auth::user()->notes->find($id);

        $notes->update(['content' => $content]);

        return redirect('home');
    }

    public function delete_post($id)
    {
        $note = Auth::user()->notes->find($id);

        $note->delete();

        return redirect('home');
    }

    public function show_details($id)
    {
        $notes = Auth::user()->notes->find($id);

        return view('Notes.show', compact('notes'));
    }

    public function profile_data($id)
    {
        $data = Auth::user()->find($id);

        return view('profile', compact('data'));
    }
}
