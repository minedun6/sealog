<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Invoice;
use App\Models\InvoiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('access');
    }

    public function printPriorNotice($id)
    {
        $folder = Folder::find($id);
        $type = $this->__getFolderType($folder);
        if ($type !== 'import') {
            return redirect()->back();
        }
        $invoice_type = InvoiceType::where('code', 'import')
            ->first();
        $invoice = Invoice::where('type_id', $invoice_type->id)
            ->where('folder_id', $folder->id)
            ->first();
        //$footer = url('/footer');
        $pdf = PDF::loadView('notice.post_notice', array(
            'folder' => $folder,
            'invoice' => $invoice
        ));//->setOption('footer-html', $footer);
        return $pdf->inline();
    }

    public function printBoardingNotice($id)
    {
        $invoice = Invoice::find($id);
        $folder = $invoice->folder;
        $type = $this->__getFolderType($folder);

        if ($type !== 'export') {
            return redirect()->back();
        }

        //$footer = url('/footer');
        $pdf = PDF::loadView('notice.boarding_notice', array(
            'folder' => $folder,
            'invoice' => $invoice
        ));//->setOption('footer-html', $footer);
        return $pdf->inline();

    }

    public function printArrivalNotice($id)
    {
        $invoice = Invoice::find($id);
        $folder = $invoice->folder;
        $type = $this->__getFolderType($folder);
        if ($type !== 'import') {
            return redirect()->back();
        }

        //$footer = url('/footer');
        $pdf = PDF::loadView('notice.arrival_notice', array(
            'folder' => $folder,
            'invoice' => $invoice
        ));//->setOption('footer-html', $footer);
        return $pdf->inline();
    }

    private function __getFolderType(Folder $folder)
    {
        return $folder->operation_type;
    }
}
