<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Google_API;
use App\Models\Article;
use App\Models\Charge;
use App\Models\Client;
use App\Models\File;
use App\Models\Folder;
use App\Models\InvoiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class FolderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('access', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $folders = Folder::all();

        return view('folder.list-dossier', array(
            'folders' => $folders
        ));

    }

    public function create()
    {
        return view('folder.add.add-folder');
    }

    public function show($id)
    {
        $folder = Folder::find($id);
        $total_charges = $folder->charges->sum('amount_exchanged');
        $total_invoices = $folder->invoices->sum('invoice_total');
        $invoice_types = InvoiceType::all();

        return view('folder.details-folder', array(
            'folder' => $folder,
            'invoice_types' => $invoice_types,
            'total_charges' => $total_charges,
            'total_invoices' => $total_invoices
        ));
    }

    public function edit($id)
    {
        $folder = Folder::find($id);
        $clients = Client::all();
        return view('folder.edit-folder', array(
            'folder' => $folder,
            'clients' => $clients
        ));
    }

    public function removeArticle($id)
    {
        $article = Article::find($id);
        $folder_id = $article->folder_id;
        $article->delete();

        return redirect('/folder/edit/' . $folder_id);
    }

    public function confirmDelete($id)
    {
        $folder = Folder::find($id);

        return view('folder.confirm_delete', array(
            'folder' => $folder
        ));
    }

    public function printFolder($id)
    {
        $folder = Folder::find($id);

        $pdf = App::make('dompdf.wrapper');
        $view = View::make('folder.print-folder', array(
            'folder' => $folder
        ))->render();
        $pdf->loadHTML($view);

        return $pdf->stream($folder->folder_name . $folder->folder_number . '.pdf');
    }

}
