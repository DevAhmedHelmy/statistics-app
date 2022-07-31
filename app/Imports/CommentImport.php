<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;


class CommentImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {

        $data=[];

        foreach ($collection as $key =>  $row) {
            if ($key > 0) {
                $data[]=[
                    'rf_id' => $row[0],
                    'comment' => $row[1],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

        }
        DB::table('test')->insert($data);

    }
}
