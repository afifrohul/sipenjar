<?php

namespace App\Imports;

use App\Models\Prisoner;
use Maatwebsite\Excel\Concerns\ToModel;

class PrisonerImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Prisoner([
            'name' => $row[1],
            'no_regis' => $row[2],
            'enter_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row[3]),
            'room' => $row[4],
            'case' => $row[5]
        ]);
    }
}
