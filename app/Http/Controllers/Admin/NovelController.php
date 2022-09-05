<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Novel;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NovelController extends Controller
{
    
    // Routing To Admin Novel Controller Page
    public function index()
    {
        $novel = Novel::latest()->get();
        return view('dashboard.novel.novel', [
            'title' => 'Novel Controller'
        ], compact('novel'));
    }

    public function add()
    {
        return view('dashboard.novel.add', [
            'title' => 'Add List Novel'
        ]);
    }

    // Insert Function
    public function insert(Request $request)
    {
        $novel = new Novel();

        // Validasi
        $validateData = $request->validate([
            'name' => 'required|unique:novel|min:5',
            'alternative' => 'required|unique:novel',
            'slug' => 'required|unique:novel',
            'genre' => 'required',
            'description' => 'required|min:10',
            'country' => 'required',
            'published' => 'required',
            'author' => 'required',
            'total_chap' => 'required',
            'type' => 'required',
            'image' => 'required|image|file|max:10048'
        ]);


        // Insert Novel To Database
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/novel',$filename);
            $novel->image = $filename;
        }

        $novel->name = $request->input('name');
        $novel->alternative = $request->input('alternative');
        $novel->slug = $request->input('slug');
        $novel->genre = $request->input('genre');
        $novel->description = $request->input('description');
        $novel->country = $request->input('country');
        $novel->published = $request->input('published');
        $novel->author = $request->input('author');
        $novel->total_chap = $request->input('total_chap');
        $novel->condition = $request->input('condition') == TRUE?'1':'0';
        $novel->status = $request->input('status') == TRUE?'1':'0';
        $novel->type = $request->input('type');

        $novel->save($validateData);
        return redirect('/dashboard/novel-controller')->with('status', 'Novel Success Added!');
    }


    public function edit($id)
    {
        $novel = Novel::find($id); 
        return view('dashboard.novel.edit', [
            'title' => 'Edit List Novel'
        ], compact('novel'));
    }

    public function update(Request $request, $id)
    {
        $novel = Novel::find($id);
        $validateData = $request->validate([
            'name' => 'required|min:5',
            'alternative' => 'required',
            'slug' => 'required',
            'genre' => 'required',
            'description' => 'required|min:10',
            'country' => 'required',
            'published' => 'required',
            'author' => 'required',
            'total_chap' => 'required',
            'type' => 'required',
        ]);

        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/novel/'.$novel->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/novel',$filename);
            $novel->image = $filename;
        }
        $novel->name = $request->input('name');
        $novel->alternative = $request->input('alternative');
        $novel->slug = $request->input('slug');
        $novel->genre = $request->input('genre');
        $novel->description = $request->input('description');
        $novel->country = $request->input('country');
        $novel->published = $request->input('published');
        $novel->author = $request->input('author');
        $novel->total_chap = $request->input('total_chap');
        $novel->condition = $request->input('condition') == TRUE?'1':'0';
        $novel->status = $request->input('status') == TRUE?'1':'0';
        $novel->type = $request->input('type');

        $novel->update($validateData);
        return redirect('/dashboard/novel-controller')->with('status', 'Novel Success Updated!');
    }

    public function delete($id)
    {
        $novel = Novel::find($id);
        if($novel->image)
        {
            $path = 'assets/uploads/novel/'.$novel->image;
            // if(File::exists($path))
            // {
            //     File::delete($path);
            // }
        }
        $novel->delete();

        $chapters = Chapter::where('nov_id', $id)->get();
        foreach ($chapters as $chapter) 
        {
            $chapter->delete();
        }

        

        return redirect('/dashboard/novel-controller')->with('status', 'Novel Success Moved To Trash!');
    }

}
