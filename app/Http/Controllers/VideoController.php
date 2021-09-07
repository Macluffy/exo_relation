<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Video::all();
        return view('pages.video',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layoutsV.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            "url"=>["required", "min:1", "max:200"],
            "img"=>["required", "min:1", "max:200"],
            "duration"=>["required", "min:1", "max:200"],
            "titre"=>["required", "min:1", "max:200"],
            "description"=>["required", "min:1", "max:200"],
        ]);
        $data = new Video;
        $data->url = $request->url;
        $data->img = $request->file('img')->hashName();
        $data->duration = $request->duration;
        $data->titre = $request->titre;
        $data->description = $request->description;
        $data->save();
        $request->file('img')->storePublicly("img", "public");
        return redirect()->route('videos.index');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        $data = $video;
        return view('layoutsV.show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        $data = $video;
        return view('layoutsV.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            "url"=>["required", "min:1", "max:200"],
            "img"=>["required", "min:1", "max:200"],
            "duration"=>["required", "min:1", "max:200"],
            "titre"=>["required", "min:1", "max:200"],
            "description"=>["required", "min:1", "max:200"],
        ]);
        Storage::disk('public')->delete("img" . $video->img);
        $video->url = $request->url;
        $video->img = $request->file('img')->hashName();
        $video->duration = $request->duration;
        $video->titre = $request->titre;
        $video->description = $request->description;
        $video->save();
        $request->file('img')->storePublicly("img", "public");

        return redirect()->route('videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        Storage::disk('public')->delete("img" . $video->img);

        $video->delete();
        return redirect()->route('videos.index');
    }
}
