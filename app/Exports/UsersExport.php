<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings,WithColumnWidths
{
    protected $start,$end;

    public function __construct($start,$end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Usuario',
            'Email',
            'Cumpleaños'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 20,
            'C' => 30,
            'D'=>20
        ];
    }

    public function collection()
    {
        return User::select('id','name','email','birth_date')->where('birth_date','>',$this->start)
                        ->where('birth_date','<',$this->end)
                        ->get();
    }
}
