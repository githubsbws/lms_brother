<?php

namespace App\Exports;

use App\Models\Company;
use App\Models\Users;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UsersExcelExport implements FromCollection, WithHeadings
{
    protected $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function collection()
    {
        // Return users collection
        return $this->users;
    }


    public function headings(): array
    {
        return [
            'ID',
            'Username',
            'ชื่อ นามสกุล',
            'Email',
            'advisor_email1',
            'Online_Status',
            'Create_at',
            'Lastvisit_at',
            'Status',
            'Last_ip',
            'Last_activity',
            'ASC_code',
            'ASC_name'
        ];
    }
}
