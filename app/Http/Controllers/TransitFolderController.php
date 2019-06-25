<?php

namespace App\Http\Controllers;

use App\Models\TransitFolder;
use Illuminate\Http\Request;
use App\Models\Folder;
use Carbon\Carbon;
use App\Models\Article;
use App\Http\Requests;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TransitFolderController extends Controller
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

        return view('folder.add.add-folder-tran', array(
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
        $folder->folder_name = $request->type == 'export' ? 'TE' : 'TI';
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

        $folder->type = 'transit';
        $folder->client_id = $request->nom_client;
        $folder->escale_number = $request->escale_number;
        $folder->rubric_number = $request->rubrique_number;
        $folder->folder_date = Carbon::createFromFormat('d/m/Y', $request->date_dossier);
        $folder->save();

        $transit_folder = new TransitFolder();
        $transit_folder->shipment_place = $request->embarq_place;
        $transit_folder->landing_place = $request->debarq_place;
        $transit_folder->type = $request->type;
        $transit_folder->folder_id = $folder->id;
        $transit_folder->save();

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

        $folder->folder_name = $request->type == 'export' ? 'TE' : 'TI';
        $folder->operation_type = $request->type;
        if ($last != null) {
            $number = substr($last->folder_number, 3, 7) + 1;
            if ($request->num_dossier && $request->num_dossier != '') {
                $number = $request->num_dossier;
            }
            $folder->folder_number = $year - 2000 . '-' . sprintf('%05d', $number);
        } else {
            $folder->folder_number = $year - 2000 . '-' . '00001';
        }

        $folder->client_id = $request->client_id;
        $folder->operation_type = $request->type;
        $folder->escale_number = $request->escale_number;
        $folder->rubric_number = $request->rubric_number;
        $folder->folder_date = Carbon::createFromFormat('d/m/Y', $request->folder_date);
        $folder->save();

        $transit_folder = $folder->transitFolder;
        $transit_folder->shipment_place = $request->shipment_place;
        $transit_folder->landing_place = $request->landing_place;
        $transit_folder->type = $request->type;
        $transit_folder->folder_id = $folder->id;
        $transit_folder->save();

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
            $article->volume = $request->volume[$i];
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
        $folder->transitFolder->delete();
        foreach ($folder->articles as $article) {
            $article->delete();
        }
        foreach ($folder->files as $file) {
            $file->delete();
        }
        foreach ($folder->invoices as $invoice) {
            $invoice->delete();
        }

        $folder->delete();

        return redirect('/folder');
    }
}
