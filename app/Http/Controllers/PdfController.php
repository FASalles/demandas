<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Sector;
use App\Models\System;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Pdf\PdfFooter;
use TCPDF;

class PdfController extends Controller
{
    public function geraPdfUsers()
    {
        $users = User::get();
        $pdf = PDF::loadView('user.index', compact('users'));

        return $pdf->setPaper('a4')->stream('Lista de usuários.pdf');
    }

    public function geraPdfSectors()
    {
        $sectors = Sector::get();
        $pdf = PDF::loadView('sector.index', compact('sectors'));

        return $pdf->setPaper('a4')->stream('Lista de setores.pdf');
    }

    public function geraPdfSystems()
    {
        $systems = System::get();
        $pdf = PDF::loadView('system.index', compact('systems'));

        return $pdf->setPaper('a4')->stream('Lista de sistemas.pdf');
    }

    public function geraPdfDemands()
    {
        $demands = Demand::get();
        $pdf = PDF::loadView('demand.index', compact('demands'));

        return $pdf->setPaper('a4')->stream('Lista de demandas.pdf');
    }
}
