<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;


class NoteController extends Controller
{
    public function store(Request $request, $long_term_goal_id, $short_term_goal_id, $task_id)
{
    $request->validate([
        'note_content' => 'required|string|max:255',
    ]);

    $note = new Note();
    $note->task_id = $task_id;
    $note->note_content = $request->note_content;
    $note->save();

    return redirect()->back()->with('success', 'メモが保存されました！');
}

}
