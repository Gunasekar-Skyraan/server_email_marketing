<?php
  
namespace App\Imports;
  
use App\Models\Calendar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
  
class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        $data['your_date_column'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['festivel_date'])->format('Y-m-d');
        $data['date'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['festivel_date'])->format('Y');
        // dd( $row);
        $year = date('Y', strtotime($row['festivel_date']));
        $table = Calendar::where('year',$data['date'])->get(); 
        $count =  count($table) + 1;
        return new Calendar(
        [
            'festivel_title'=> $row['festivel_title'] ?? null,
            'category_id'=>$row['category_id'] ?? null,
            'festivel_date'=> $data['your_date_column'] ?? null,
            'festivel_short_description'=>$row['festivel_short_description'] ?? null,
            'festivel_description'=>$row['festivel_description'] ?? null,
            'festivel_description_type'=>$row['text_type'] ?? null,
            'book_number'=>$row['book_number'] ?? null,
            'start_verse_number'=>$row['start_verse_number'] ?? null,
            'end_verse_number'=>$row['end_verse_number'] ?? null,
            'chapter_number'=>$row['chapter_number'] ?? null,
            'festivel_type'=>$row['festivel_type'] ?? null,
            'district'=>$row['district'] ?? null,
            'country'=>$row['country'] ?? null,
            'state'=>$row['state'] ?? null,
            'year'=> $data['date'] ?? null,
            'lastfetched_year' => $data['date'].$count ?? null,
            'fasting_start_date'=>$row['fasting_start_date']  ?? null,
            'fasting_end_date'=>$row['fasting_end_date']  ?? null,
        ]
        );
    }
}