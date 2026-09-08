<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * POST /admin/generate
     * Generate slug baru dalam jumlah banyak untuk persiapan cetak massal.
     */
    public function generate(Request $request)
    {
        $adminSecret = config('app.admin_secret', 'GANTI_SECRET_INI');
        
        $providedSecret = $request->bearerToken() ?? $request->input('secret');

        if ($providedSecret !== $adminSecret) {
            abort(403, 'Akses tidak diizinkan. Sertakan secret key yang benar.');
        }

        $count     = (int) $request->input('count', 100);
        $count     = max(1, min($count, 500)); // Batasi 1–500
        $generated = [];
        $insertData = [];
        $attempts  = 0;
        $now       = now();

        while (count($generated) < $count && $attempts < ($count * 5)) {
            $slug = strtolower(Str::random(8));
            $attempts++;

            if (!in_array($slug, $generated) && !Link::where('slug', $slug)->exists()) {
                $generated[] = $slug;
                $insertData[] = [
                    'slug'       => $slug,
                    'url_gmb'    => null,
                    'is_claimed' => false,
                    'pin'        => null,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }
        
        if (!empty($insertData)) {
            Link::insert($insertData);
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
