<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LoginUser;
use Hash;
use Session;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function viewIndex()
    {
       return view("index");
    }

    public function viewFiles()
    {
        $space =  DB::select('SELECT * from tbl_space'); 
        return view("files")->with(compact('space'));
    }

    public function uploadFiles(Request $request)
    {
        $request -> validate([
            'firstname' => 'required|min:2|max:20',
            'lastname' => 'required|min:2|max:20',
            'files.*' => 'required|file|mimes:jpg,png,jpeg|max:5048', 
        ]);

        $uploadedPaths = [];

        foreach ($request->file('files') as $file) {
            $path = $file->store('uploads', 'spaces');
            if ($path === false || empty($path) || $path === '') {
                return response()->json(['error' => 'Error in uploading file to Digital Space']);
            }

            DB::table('tbl_space')->insert([
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'filename' => $file->getClientOriginalName(),
                'path' => $path,
            ]);

            $uploadedPaths[] = $path;
        }
        return response()->json(['success' => 'Uploaded to Digital Space' ,'paths' => $uploadedPaths]);
    }   

    public function deleteSpaceFile(Request $request){
        $file = DB::table('tbl_space')->find($request -> id);

        if (!$file) {
            return response()->json(['error' => 'File not found'], 404);
        }

        $filePath = $file->path;

        if (Storage::disk('spaces')->exists($filePath)) {
            Storage::disk('spaces')->delete($filePath);
            DB::table('tbl_space')->where('id', $request->id)->delete();
            return redirect('/files');
        } else {
            return response()->json(['error' => 'File not found in Digital Space'], 404);
        }
    }
}
