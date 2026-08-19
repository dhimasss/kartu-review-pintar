<?php

namespace App\Console\Commands;

use App\Models\Link;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateLinks extends Command
{
    /**
     * Nama dan signature command.
     */
    protected $signature = 'links:generate
                            {count=100 : Jumlah slug yang akan di-generate}
                            {--length=8 : Panjang karakter slug}';

    /**
     * Deskripsi command.
     */
    protected $description = 'Generate sejumlah link/slug unik untuk persiapan cetak massal kartu NFC & QR.';

    public function handle(): int
    {
        $count  = (int) $this->argument('count');
        $length = (int) $this->option('length');

        $count  = max(1, min($count, 1000));
        $length = max(6, min($length, 16));

        $this->info("⚡ Generating {$count} slug baru (panjang: {$length} karakter)...");
        $this->newLine();

        $generated = [];
        $attempts  = 0;
        $bar       = $this->output->createProgressBar($count);
        $bar->start();

        while (count($generated) < $count && $attempts < ($count * 5)) {
            $slug = strtolower(Str::random($length));
            $attempts++;

            if (! Link::where('slug', $slug)->exists()) {
                $link = Link::create([
                    'slug'       => $slug,
                    'url_gmb'    => null,
                    'is_claimed' => false,
                    'pin'        => null,
                ]);
                $generated[] = ['Slug' => $link->slug, 'URL' => url("/{$link->slug}"), 'Status' => 'Belum Diklaim'];
                $bar->advance();
            }
        }

        $bar->finish();
        $this->newLine(2);

        if (empty($generated)) {
            $this->error('Gagal generate slug. Coba tingkatkan panjang karakter.');
            return Command::FAILURE;
        }

        $this->table(['Slug', 'URL', 'Status'], $generated);

        $this->newLine();
        $this->info('✅ Berhasil generate ' . count($generated) . ' kartu baru!');
        $this->line('   Salin URL di atas untuk dicetak di kartu NFC/QR Anda.');

        return Command::SUCCESS;
    }
}
