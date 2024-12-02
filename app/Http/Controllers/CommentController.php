<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $resep_id)
        {
            $request->validate([
                'comment' => 'required|string|max:500',
            ]);

            Comment::create([
                'user_id' => Auth::id(),
                'resep_id' => $resep_id,
                'comment' => $request->comment,
            ]);

            return back()->with('success', 'Komentar berhasil ditambahkan!');
        }

    public function show($id)
        {
            $comment = Comment::findOrFail($id);

            return view('admin.comment.show', compact('comment'));
        }
}
