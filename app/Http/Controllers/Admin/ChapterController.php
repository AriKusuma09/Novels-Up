<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Novel;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index()
    {
        $chapter = Chapter::latest()->paginate(7);
        return view('dashboard.chapter.chapter', [
            'title' => 'Chapter Controller'
        ], compact('chapter'));
    }

    public function add()
    {
        $novel = Novel::where('condition', '1')->where('status', '1')->latest()->get();
        return view('dashboard.chapter.add', [
            'title' => 'Add List Chapter'
        ], compact('novel'));
    }

    public function insert(Request $request)
    {
        $chapter = new Chapter();
        
        // Validasi
        $validateData = $request->validate([
            'name' => 'required|unique:chapter|min:2',
            'nov_id' => 'required',
            'slug' => 'required|unique:chapter',
            'chapter' => 'required',
            'image' => 'required|image|file|max:20024',
            'text' => 'required'
        ]);

        // Insert Chapter To Database
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/chapter/',$filename);
            $chapter->image = $filename;
        }
        
        $chapter->nov_id = $request->input('nov_id');
        $chapter->name = $request->input('name');
        $chapter->slug = $request->input('slug');
        $chapter->status = $request->input('status') == TRUE?'1':'0';
        $chapter->chapter = $request->input('chapter');
        $chapter->text = $request->input('text');

        // $validateData['text'] = $request->file('text')->store('ilustrasi');

        $chapter->save($validateData);
        return redirect('/dashboard/chapter-controller')->with('status', 'Chapter Success Added!');
    }

    
    // Update Chapter
    public function edit($id)
    {
        $chapter = Chapter::find($id); 
        return view('dashboard.chapter.edit', [
            'title' => 'Edit List Chapter'
        ], compact('chapter'));

    }

    public function update(Request $request, $id)
    {
        $chapter = Chapter::find($id);
        $validateData = $request->validate([
            'name' => 'required|min:2',
            'slug' => 'required',
            'chapter' => 'required',
            'text' => 'required'
        ]);

        // Insert Chapter To Database
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/chapter/'.$chapter->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/chapter/',$filename);
            $chapter->image = $filename;
        }

        $chapter->name = $request->input('name');
        $chapter->slug = $request->input('slug');
        $chapter->status = $request->input('status') == TRUE?'1':'0';
        $chapter->chapter = $request->input('chapter');
        $chapter->text = $request->input('text');
        $chapter->update($validateData);
        return redirect('/dashboard/chapter-controller')->with('status', 'Chapter Success Updated!');

    }


    // Delete Chapter
    public function delete($id)
    {
        $chapter = Chapter::find($id);
        $path = 'assets/uploads/chapter/'.$chapter->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $chapter->delete();
        return redirect('/dashboard/chapter-controller')->with('status', 'Chapter Success Deleted!');
    }


    // public function checkSlug(Request $request)
    // {
    //     $slug = SlugService::createSlug(Chapter::class, 'slug', $request->chapterName)
    // }
}
