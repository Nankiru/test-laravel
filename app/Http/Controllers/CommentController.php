<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


public function store(Request $request)
{
    $validated = $request->validate([
        'content' => 'required|string|max:100',
    ]);

    $comment = new Comment();
    $comment->content = $validated['content'];
    $comment->user_id = Auth::id();
    $comment->save();

    if ($request->ajax()) {
        // Prepare user image URL like in Blade
        $user = Auth::user();

        $userImage = $user->img
            ? asset('uploads/users/' . $user->img)
            : ($user->gender === 'female'
                ? 'https://st3.depositphotos.com/9998432/13335/v/450/depositphotos_133352104-stock-illustration-default-placeholder-profile-icon.jpg'
                : ($user->gender === 'male'
                    ? 'https://cdn.vectorstock.com/i/preview-1x/50/19/gray-man-silhouette-vector-26185019.jpg'
                    : asset('uploads/users/default.png')));

        return response()->json([
            'success' => true,
            'comment' => [
                'content' => $comment->content,
                'created_at' => $comment->created_at->setTimezone('Asia/Phnom_Penh')->format('h:i:s A d-M-Y'),
                'user' => [
                    'name' => $user->name,
                    'img' => $userImage,
                ],
            ],
        ]);
    }

    return redirect()->back()->with('success', 'Comment posted successfully.');
}


    public function showCommentsPage()
{
    $comments = Comment::with('user')->latest()->get();

    return view('details/product-detail', compact('comments'));
}
}
