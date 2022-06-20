<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ExcelImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            [
            // 'name' => $row[0],
            "Hoist_Label" => $row[8],
            "Hoist_Type" => $row[1],
            "Function" => $row[2],
            "Total_Point_Load" => $row[3],
            "X" => $row[4],
            "Y" => $row[5],
            "LAYER" => $row[6],
            "NAME" => $row[7],
            "SYMBOL_USED" => $row[8],
            ];
        }
    }
}
