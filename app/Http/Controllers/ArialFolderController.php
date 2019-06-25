<?php

namespace App\Http\Controllers;

use App\Models\ArialFolder;
use App\Models\Client;
use App\Models\Folder;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Article;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class ArialFolderController extends Controller
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

        return view('folder.add.add-folder-aerien', array(
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
        $folder->folder_name = $request->type == 'export' ? 'AE' : 'AI';
        $folder->operation_type = $request->type;
        //$folder_name = $request->type == 'export' ? 'AE' : 'AI';

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

        $folder->type = 'arial';
        $folder->client_id = $request->nom_client;
        $folder->escale_number = $request->escale_number;
        $folder->rubric_number = $request->rubrique_number;
        $folder->folder_date = Carbon::createFromFormat('d/m/Y', $request->date_dossier);
        $folder->save();

        $arial_folder = new ArialFolder();
        $arial_folder->type = $request->type;
        $arial_folder->shipment_place = $request->embarq_place;
        $arial_folder->landing_place = $request->debarq_place;
        $arial_folder->flight_number = $request->vol;
        $arial_folder->lta_number = $request->lta;
        $arial_folder->folder_id = $folder->id;
        $arial_folder->save();

        $articles = count($request->numero_marchandise);
        for ($i = 0; $i < $articles; $i++) {
            $article = new Article();
            $article->container_number = $request->numero_marchandise[$i];
            $article->container_mark = $request->marque_marchandise[$i];
            $article->packages_number = $request->nombre[$i];
            $article->volume = $request->volume[$i];
            $article->designation = $request->designation[$i];
            $article->gross_weight = $request->poids[$i];
            $article->folder_id = $folder->id;
            $article->save();
        }

        return redirect('/folder/' . $folder->id);
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

        $folder->folder_name = $request->type == 'export' ? 'AE' : 'AI';
        if ($last != null) {
            $number = substr($last->folder_number, 3, 7) + 1;
            if ($request->num_dossier && $request->num_dossier != '') {
                $number = $request->num_dossier;
            }
            $folder->folder_number = $year - 2000 . '-' . sprintf('%05d', $number);
        } else {
            $folder->folder_number = $year - 2000 . '-' . '00001';
        }
        $folder->operation_type = $request->type;
        $folder->client_id = $request->client_id;
        $folder->escale_number = $request->escale_number;
        $folder->rubric_number = $request->rubrique_number;
        $folder->folder_date = Carbon::createFromFormat('d/m/Y', $request->folder_date);
        $folder->save();

        $arial_folder = $folder->arialFolder;
        $arial_folder->type = $request->type;
        $arial_folder->shipment_place = $request->shipment_place;
        $arial_folder->landing_place = $request->landing_place;
        $arial_folder->flight_number = $request->vol;
        $arial_folder->lta_number = $request->lta;
        $arial_folder->folder_id = $folder->id;
        $arial_folder->save();

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
        $folder->arialFolder->delete();
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
