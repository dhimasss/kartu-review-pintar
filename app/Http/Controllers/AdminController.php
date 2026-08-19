<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * GET /admin/generate?secret=xxx&count=100
     * Generate slug baru dalam jumlah banyak untuk persiapan cetak massal.
     */
    public function generate(Request $request)
    {
        $adminSecret = config('app.admin_secret', 'GANTI_SECRET_INI');

        if ($request->get('secret') !== $adminSecret) {
            abort(403, 'Akses tidak diizinkan. Sertakan secret key yang benar.');
        }

        $count     = (int) $request->get('count', 100);
        $count     = max(1, min($count, 500)); // Batasi 1–500
        $generated = [];
        $attempts  = 0;

        while (count($generated) < $count && $attempts < ($count * 5)) {
            $slug = strtolower(Str::random(8));
            $attempts++;

            if (! Link::where('slug', $slug)->exists()) {
                $link = Link::create([
                    'slug'       => $slug,
                    'url_gmb'    => null,
                    'is_claimed' => false,
                    'pin'        => null,
                ]);
                $generated[] = $link->slug;
            }
        }

        $baseUrl = url('/');

        return response()->json([
            'status'      => 'success',
            'generated'   => count($generated),
            'slugs'       => $generated,
            'links'       => array_map(fn($s) => "$baseUrl/$s", $generated),
            'message'     => count($generated) . ' kartu baru berhasil di-generate. Siap cetak!',
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}
