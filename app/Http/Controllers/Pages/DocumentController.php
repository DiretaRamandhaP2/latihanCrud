<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.formDocument');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return json_encode($request->all());
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'category' => 'required|in:public,internal,confidential',
            'file_path' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($validate->fails()) {
            return redirect()->back();
        }

        $file = $request->file('file_path');
        $fileName = time() . '_' . preg_replace('/\s+/', '_', $request->input('title')) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('documents', $fileName, 'public');

        Document::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'file_path' => $path,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $document = Document::find($document->id);
        return view('pages.formDocument', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        // return json_encode($request->all());
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'category' => 'required|in:public,internal,confidential',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($validate->fails()) {
            return redirect()->back();
        }

        $doc = Document::find($document->id);

        if ($request->file_path) {
            $file = $request->file('file_path');
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $request->input('title')) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('documents', $fileName, 'public');
        }else {
            $path = $doc->file_path;
        }

        $doc->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'file_path' => $path,
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        $doc = Document::find($document->id);
        $doc->delete();
        return redirect()->route('dashboard');
    }
}
