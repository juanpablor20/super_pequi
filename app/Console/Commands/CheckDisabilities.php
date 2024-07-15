<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Disability;
use App\Events\SancionFinalizada;
use Carbon\Carbon;

class CheckDisabilities extends Command
{
    protected $signature = 'check:disabilities';
    protected $description = 'Check and update disabilities based on end date';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $currentDate = Carbon::now()->startOfDay();

        $disabilities = Disability::where('status', 'activo')
            ->whereDate('end_date', '<=', $currentDate)
            ->get();

        foreach ($disabilities as $disability) {
            $disability->status = 'inactivo'; // Cambia el estado a 'inactivo'
            $disability->save();

            event(new SancionFinalizada($disability->id));

            $this->info("Disability ID {$disability->id} has been updated and event fired.");
        }

        $this->info('All relevant disabilities have been checked and updated.');
    }
}

