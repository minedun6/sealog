<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('access');
    }

    public function create($id)
    {
        $folder = Folder::find($id);

        return view('folder.files.add-files', array(
            'folder' => $folder
        ));
    }

    public function store(Request $request, $id)
    {
        $documents = $request->documents;
        $folder = Folder::find($id);
        $google_api = new Google_API();
        $result = $google_api->uploadFile($documents, $folder);

        return redirect('/folder/' . $folder->id);

    }

    public function deleteFile(Request $request)
    {
        $google_drive_file_id = $request->file_id;
        $file = File::where('google_drive_id', $google_drive_file_id);
        $google_api = new Google_API();

        if ($google_api->deleteFile($google_drive_file_id)) {
            $file->delete();
            return json_encode(['status' => true]);
        }

        return json_encode(['status' => false]);
    }
}
