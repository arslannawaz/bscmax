<?php

namespace App\Imports;

use App\Products;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable;

    public function model(array $row)
    {

      //dd($row);
        return new Products([
            'url'     => $row['url'],
            'brand'    => $row['brand'],
            'image'    => $row['image_url'],
            'product_name'    => $row['product_name'],
            'category'    => $row['category'],
            'subcategory'    => $row['subcategory'],
            'p_s_term'    => $row['primary_search_term'],
            'r_s_term'    => $row['related_search_terms'],
            'price'    => $row['price'],
            'state_origin'    => $row['state_of_origin'],
            'city_origin'    => $row['city_of_origin'],
            'black_business'    => $row['black_business'],
            'usa_source'    => $row['usa_sourced'],
            'usa_assembled'    => $row['usa_assembled'],
            'usa_owned'    => $row['usa_owned'],
            'family_business'    => $row['family_business'],
            'veteran_business'    => $row['veteran_business'],
            'puerto_rican_business'    => $row['puerto_rican_business'],
            'verified'    => $row['verified'],
        ]);
    }
        public function rules(): array
      {
        return [
          'url' => ['required'],
          'brand' => ['required','max:191'],
          'product_name' => ['required','max:191'],
          'category' => ['required','max:191'],
          'subcategory' => ['required'],
          'primary_search_term' => ['required'],
          'related_search_terms' => ['required'],
          'price' => ['required'],
          // 'not_opened' => ['required','numeric','min:0','max:100'],
          'state_of_origin' => ['required'],
          'city_of_origin' => ['required'],
          'black_business' => ['required'],
          'usa_sourced' => ['required'],
          'usa_assembled' => ['required'],
          'usa_owned' => ['required'],
          'family_business' => ['required'],
           'veteran_business' => ['required'],
            'puerto_rican_business' => ['required'],
             'verified' => ['required'],
          // 'recipients_left' => ['required','integer', 'min:0'],
        ];
      }
}
