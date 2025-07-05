<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class AssetExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;
    protected $asset;

    public function __construct($asset)
    {
        $this->asset = $asset;
    }
    public function View(): View
    {
        return view('Export.asset', [
            'asset' => $this->asset
        ]);
    }
}
