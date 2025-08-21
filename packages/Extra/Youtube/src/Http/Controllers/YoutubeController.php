<?php

namespace Extra\Youtube\Http\Controllers;

use Illuminate\Http\Request;
use Extra\Youtube\Models\YoutubeVideo;

class YoutubeController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $videos = YoutubeVideo::latest()->paginate(10);
        return view('youtube.index', compact('videos'));
    }

    public function create()
    {
        return view('youtube.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url'   => 'required|url',
        ]);

        YoutubeVideo::create($request->only('title', 'url'));

        return redirect()->route('youtube.index')->with('success', 'video added successfully!');
    }

    public function destroy(YoutubeVideo $video)
    {
        $video->delete();
        return back()->with('success', 'Видео удалено.');
    }
}

