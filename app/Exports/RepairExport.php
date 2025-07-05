<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class RepairExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function View(): View
    {
        return view('Export.repair', [
            'repair' => $this->data
        ]);
    }
}
