<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Novel;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function index()
    {
        return view ('dashboard.trash.trash', [
            'title' => 'Trash',
            'trash' => Novel::onlyTrashed()->get(),
            'chapter' =>Chapter::onlyTrashed()->get()
        ]);
    }

    public function restore($id)
    {
        $chapters = Chapter::onlyTrashed()->where('nov_id', $id)->restore();
        // foreach ($chapters as $chapter)
        // {
        //     $chapter->restore();
        // }

        Novel::onlyTrashed()->find($id)->restore();

        return back()->with('restore', 'UDAH DI RESTORE BUT');
    }

    public function delete($id)
    {
        Novel::onlyTrashed()->find($id)->forceDelete();
        Chapter::onlyTrashed()->where('nov_id', $id)->forceDelete();

        return back()->with('deletePermanent', 'Data Has Been Deleted!');
    }
}
