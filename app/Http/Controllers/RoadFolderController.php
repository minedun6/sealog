<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\RoadFolder;
use Illuminate\Http\Request;
use App\Models\Article;
use Carbon\Carbon;
use App\Models\Folder;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RoadFolderController extends Controller
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
        $cliens = Client::all();

        return view('folder.add.add-folder-rou', array(
            'clients' => $cliens
        ));
    }

    public function store(Request $request)
    {
        $year = Carbon::now('Africa/Tunis')->year;
        if($request->folder_year && $request->folder_year !='')
            $year = $request->folder_year;
        $last = Folder::where('folder_number', 'like', "%" . ($year - 2000) . '-' . '%')
            ->orderBy('folder_number', 'DESC')->first();

        $folder = new Folder();
        $folder->folder_name = $request->type == 'export' ? 'RE' : 'RI';
        $folder->operation_type = $request->type;
        //$folder_name = $request->type == 'export' ? 'RE' : 'RI';
        if ($last != null) {
            $number= substr($last->folder_number, 3, 7) + 1;
            if($request->num_dossier && $request->num_dossier != ''){
                $number = $request->num_dossier;
            }
            $folder->folder_number = $year - 2000 . '-' . sprintf('%05d', $number);
            //$folder->folder_number = $folder_name . ($year - 2000) . '-' . sprintf('%05d', substr($last->folder_number, 5, 9) + 1);
        } else {
            $folder->folder_number = $year - 2000 . '-' . '00001';
            //$folder->folder_number = $folder_name . ($year - 2000) . '-' . '00001';
        }

        $folder->type = 'road';
        $folder->client_id = $request->nom_client;
        $folder->escale_number = $request->escale_number;
        $folder->rubric_number = $request->rubrique_number;
        $folder->folder_date = Carbon::createFromFormat('d/m/Y', $request->date_dossier);
        $folder->save();

        $road_folder = new RoadFolder();
        $road_folder->type = $request->type;
        $road_folder->shipment_place = $request->embarq_place;
        $road_folder->landing_place = $request->debarq_place;
        $road_folder->truck = $request->camion;
        $road_folder->cma_number = $request->cma;
        $road_folder->folder_id = $folder->id;
        $road_folder->save();

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

        return redirect('folder/' . $folder->id);
        //return redirect('folder/add');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $folder = Folder::find($id);

        $year = Carbon::now('Africa/Tunis')->year;
        if($request->folder_year && $request->folder_year !='')
            $year = $request->folder_year;

        $last = Folder::where('folder_number', 'like', "%" . ($year - 2000) . '-' . '%')
            ->orderBy('folder_number', 'DESC')->first();

        $folder->folder_name = $request->type == 'export' ? 'RE' : 'RI';
        if ($last != null) {
            $number= substr($last->folder_number, 3, 7) + 1;
            if($request->num_dossier && $request->num_dossier != ''){
                $number = $request->num_dossier;
            }
            $folder->folder_number = $year - 2000 . '-' . sprintf('%05d', $number);
        } else {
            if($request->num_dossier && $request->num_dossier != ''){
                $number = $request->num_dossier;
                $folder->folder_number = $year - 2000 . '-' . sprintf('%05d', $number);
            }
            else {
                $folder->folder_number = $year - 2000 . '-' . '00001';
            }
        }

        $folder->client_id = $request->client_id;
        $folder->operation_type = $request->type;
        $folder->escale_number = $request->escale_number;
        $folder->rubric_number = $request->rubrique_number;
        $folder->folder_date = Carbon::createFromFormat('d/m/Y', $request->folder_date);
        $folder->save();

        $road_folder = $folder->roadFolder;
        $road_folder->type = $request->type;
        $road_folder->shipment_place = $request->shipment_place;
        $road_folder->landing_place = $request->landing_place;
        $road_folder->truck = $request->camion;
        $road_folder->cma_number = $request->cma;
        $road_folder->folder_id = $folder->id;
        $road_folder->save();

        $articles = count($request->numero_marchandise);
        for ($i = 0; $i < $articles; $i++) {
            if (isset($request->article_id[$i]))
                $article = Article::find($request->article_id[$i]);
            else
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

    public function show($id)
    {

    }

    public function destroy($id)
    {
        $folder = Folder::find($id);

        $google_service = new Google_API();
        $google_service->deleteFolder($folder);

        $folder->roadFolder->delete();
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
