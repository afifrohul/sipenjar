<?php

namespace App\Exports;

use App\Models\Send;
use Maatwebsite\Excel\Concerns\FromCollection;

class SendExport implements FromCollection
{
    /**
     *
    * @return \Illuminate\Support\Collection
    */
    public $startDate;
    public $endDate;
    
    public function collection()
    {
        return Send::whereBetween('created_at',[$startDate,$endDate]);
        // return Send::all();
    }
}
