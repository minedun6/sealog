<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Client;
use App\Models\Folder;
use App\Models\MaritimeFolder;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MaritimeFolderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('access');
    }

    public function index()
    {

    }

    public function create()
    {
        $clients = Client::all();

        return view('folder.add.add-folder-maritime', array(
            'clients' => $clients
        ));
    }

    public function store(Request $request)
    {
        $year = Carbon::now('Africa/Tunis')->year;
        if ($request->folder_year && $request->folder_year != '')
            $year = $request->folder_year;
        $last = Folder::where('folder_number', 'like', "%" . ($year - 2000) . '-' . '%')
            ->orderBy('folder_number', 'DESC')->first();

        $folder = new Folder();
        //$folder_name = $request->type == 'export' ? 'ME' : 'MI';
        $folder->folder_name = $request->type == 'export' ? 'ME' : 'MI';
        $folder->operation_type = $request->type;
        if ($last != null) {
            $number = substr($last->folder_number, 3, 7) + 1;
            if ($request->num_dossier && $request->num_dossier != '') {
                $number = $request->num_dossier;
            }
            $folder->folder_number = $year - 2000 . '-' . sprintf('%05d', $number);
        } else {
            $folder->folder_number = $year - 2000 . '-' . '00001';
            //$folder->folder_number = $folder_name . ($year - 2000) . '-' . '00001';
        }

        $folder->type = 'maritime';
        $folder->client_id = $request->nom_client;
        //$folder->client_id = $request->client_id;
        $folder->escale_number = $request->escale_number;
        $folder->rubric_number = $request->rubric_number;
        $folder->folder_date = Carbon::createFromFormat('d/m/Y', $request->folder_date);
        $folder->save();

        $martime_folder = new MaritimeFolder();
        $martime_folder->shipment_place = $request->shipment_place;
        $martime_folder->landing_place = $request->landing_place;
        $martime_folder->ship = $request->ship;
        $martime_folder->bl_number = $request->bl_number;
        $martime_folder->type = $request->type;
        $martime_folder->folder_id = $folder->id;
        $martime_folder->save();

        $articles = count($request->numero_marchandise);
        for ($i = 0; $i < $articles; $i++) {
            $article = new Article();
            $article->container_number = $request->numero_marchandise[$i];
            $article->container_mark = $request->marque_marchandise[$i];
            $article->packages_number = $request->nombre[$i];
            $article->designation = $request->designation[$i];
            $article->volume = $request->volume[$i];
            $article->gross_weight = $request->poids[$i];
            $article->folder_id = $folder->id;
            $article->save();
        }

        return redirect('/folder/' . $folder->id);
        //return redirect('folder/add');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $folder = Folder::find($id);
        $year = Carbon::now('Africa/Tunis')->year;
        if ($request->folder_year && $request->folder_year != '')
            $year = $request->folder_year;

        $last = Folder::where('folder_number', 'like', "%" . ($year - 2000) . '-' . '%')
            ->orderBy('folder_number', 'DESC')->first();

        $folder->folder_name = $request->type == 'export' ? 'ME' : 'MI';
        if ($last != null) {
            $number = substr($last->folder_number, 3, 7) + 1;
            if ($request->num_dossier && $request->num_dossier != '') {
                $number = $request->num_dossier;
            }
            $folder->folder_number = $year - 2000 . '-' . sprintf('%05d', $number);
        } else {
            if ($request->num_dossier && $request->num_dossier != '') {
                $number = $request->num_dossier;
                $folder->folder_number = $year - 2000 . '-' . sprintf('%05d', $number);
            } else {
                $folder->folder_number = $year - 2000 . '-' . '00001';
            }
        }

        $folder->client_id = $request->client_id;
        $folder->operation_type = $request->type;
        $folder->escale_number = $request->escale_number;
        $folder->rubric_number = $request->rubric_number;
        $folder->folder_date = Carbon::createFromFormat('d/m/Y', $request->folder_date);
        $folder->save();

        $martime_folder = $folder->maritimeFolder;
        $martime_folder->shipment_place = $request->shipment_place;
        $martime_folder->landing_place = $request->landing_place;
        $martime_folder->ship = $request->ship;
        $martime_folder->bl_number = $request->bl_number;
        $martime_folder->type = $request->type;
        $martime_folder->folder_id = $folder->id;
        $martime_folder->save();

        $articles = count($request->numero_marchandise);
        for ($i = 0; $i < $articles; $i++) {
            if (isset($request->article_id[$i]))
                $article = Article::find($request->article_id[$i]);
            else
                $article = new Article();
            $article->container_number = $request->numero_marchandise[$i];
            $article->container_mark = $request->marque_marchandise[$i];
            $article->packages_number = $request->nombre[$i];
            $article->designation = $request->designation[$i];
            $article->gross_weight = $request->poids[$i];
            $article->folder_id = $folder->id;
            $article->save();
        }

        return redirect('/folder/' . $folder->id);
    }

    public function show($id)
    {

    }

    public function destroy($id)
    {
        $folder = Folder::find($id);

        $google_service = new Google_API();
        $google_service->deleteFolder($folder);

        $folder->maritimeFolder->delete();
        foreach ($folder->articles as $article) {
            $article->delete();
        }
        foreach ($folder->invoices as $invoice) {
            $invoice->delete();
        }
        foreach ($folder->files as $file) {
            $file->delete();
        }

        $folder->delete();

        return redirect('/folder');
    }

}
