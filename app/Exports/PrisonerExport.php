<?php

namespace App\Exports;

use App\Models\Prisoner;
use Maatwebsite\Excel\Concerns\FromCollection;

class PrisonerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Prisoner::all();
    }
}
