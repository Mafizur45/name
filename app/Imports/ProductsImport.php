<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; // <-- add this

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Skip rows missing required data
        if (empty($row['name']) || empty($row['quantity']) || empty($row['price'])) {
            return null;
        }

        return new Product([
            'name'     => $row['name'],
            'quantity' => (int) $row['quantity'],
            'price'    => (float) $row['price'],
        ]);
    }
}
