<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserBooksExport implements FromArray, WithHeadings
{
    protected $books;

    public function __construct(array $books)
    {
        $this->books = $books;
    }

    public function array(): array
    {
        return $this->books;
    }

    public function headings(): array
    {
        return [
            'id',
            'title',
            'description',
            'price $',
            'quantity',
            'created_at',
            'genre',
            'author'
        ];
    }
}