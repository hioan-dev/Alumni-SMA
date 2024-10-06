<?php

namespace App\Http\Controllers;

use App\Models\Sambutan;
use Illuminate\Http\Request;

class SambutanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sambutan::all();
        return view('admin.sambutan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sambutan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'banner' => 'nullable|image|max:2048',
            'sambutan' => 'required',
        ]);
        if ($request->hasFile('banner')) {
            $fileName = $request->file('banner')->getClientOriginalName();
            $request->file('banner')->move(public_path('sambutan_image/'), $fileName);
            $data = Sambutan::create([
                'banner' => $fileName,
                'sambutan' => $request->input('sambutan'),
            ]);
        } else {
            $data = Sambutan::create($request->only('sambutan'));
        }
        $data->save();
        return redirect()->route('sambutan.index')->with('success', 'Kata Sambutan Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sambutan  $sambutan
     * @return \Illuminate\Http\Response
     */
    public function show(Sambutan $sambutan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sambutan  $sambutan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Sambutan::findOrFail($id);
        return view('admin.sambutan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sambutan  $sambutan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Sambutan::findOrFail($id);
        $updateData = $request->only([
            'sambutan',
        ]);
        if ($request->hasFile('banner') && $request->file('banner')->isValid()) {
            if ($data->banner) {
                $oldBannerPath = public_path('sambutan_image/' . $data->banner);
                if (file_exists($oldBannerPath)) {
                    unlink($oldBannerPath); // Remove the old file
                }
            }
            $file = $request->file('banner');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('sambutan_image'), $fileName);
            $updateData['banner'] = $fileName;
        }

        $data->update($updateData);

        return redirect()->route('sambutan.index')->with('success', 'Kata Sambutan Diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sambutan  $sambutan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the sambutan record by ID
        $data = Sambutan::findOrFail($id);

        // Check if the banner file exists and delete it
        if ($data->banner) {
            $bannerPath = public_path('sambutan_image/' . $data->banner);
            if (file_exists($bannerPath)) {
                unlink($bannerPath); // Delete the file
            }
        }

        // Delete the sambutan record from the database
        $data->delete();

        // Redirect back with a success message
        return redirect()->route('sambutan.index')->with('success', 'Kata Sambutan Berhasil Dihapus');
    }
}