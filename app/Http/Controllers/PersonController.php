<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Person::where('published', '=', 1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePersonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonRequest $request)
    {
        return Person::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Person::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePersonRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonRequest $request, $id)
    {
        Person::findOrFail($id)->update($request->all());
        return response('updated');
    }

    public function publish(Request $request, $id)
    {
        $person = Person::findOrFail($id);
        $person->published = $request->input('published');
        $person->save();
        if ($request->input('published')) {
            return response()->json(["message" => "Profile is now visible on the People page."]);
        }

        return response()->json(["message" => "Profile is no longer visible."]);
    }

    public function uploadImage(Request $request)
    {
        if (!$request->file('file')) {
            return response()->json(["s3_image_url" => 'no image provided']);
        }
        $path = $request->file('file')->store('profile_images', 's3');

        if ($path) {
            $person = Person::find(Auth::id());
            $person->s3_image_url = $path;
            $person->save();
        }

        return response()->json(["s3_image_url" => $path]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return int
     */
    public function destroy(int $id): int
    {
        return Person::destroy($id);
    }
}
