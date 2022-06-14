<?php

namespace App\Jobs;

use App\Exports\UsersExport;
use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class GenerateReportExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $nombreFile,$start,$end,$title;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($nombreFile,$request)
    {
        $this->nombreFile = $nombreFile;
        $this->start = $request->start;
        $this->end = $request->end;
        $this->title = $request->title;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Excel::store(new UsersExport($this->start,$this->end),'reports/'.$this->nombreFile);

    }
}
