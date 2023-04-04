<?php

namespace App\Console\Commands;

use Domain\Quotation\Models\Quotation;
use Illuminate\Console\Command;

class TemporaryQuotationDeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'local:temp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Used for clearing quotations that have status open for more than 5 days';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->line('Deleting temporary quotations');

        $quotations = Quotation::query()
            ->where('created_at', '<=', now()->subDays(5))
            ->get();

        foreach ($quotations as $quotation) {
            $id = $quotation->id;

            $this->info('Deleting temporary quotation: ' . $id);
            $quotation->delete();
            $this->info('Deleted temporary quotation: ' . $id);
        }

        $this->line('Deleted temporary quotations successfully');
    }
}
