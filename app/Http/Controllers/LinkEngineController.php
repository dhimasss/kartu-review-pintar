<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\ScanLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LinkEngineController extends Controller
{
    /**
     * GET /{slug}
     * Redirect ke GMB jika sudah diklaim, atau tampilkan form aktivasi.
     */
    public function show(string $slug)
    {
        $link = Link::where('slug', $slug)->firstOrFail();

        if ($link->is_claimed) {
            // Catat scan log
            ScanLog::create([
                'link_id'    => $link->id,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);

            // Redirect langsung ke Google Maps
            return redirect()->away($link->url_gmb, 302);
        }

        // Kartu belum diklaim – tampilkan form aktivasi
        return view('activate', compact('link'));
    }

    /**
     * POST /{slug}
     * Proses aktivasi kartu.
     */
    public function activate(Request $request, string $slug)
    {
        $link = Link::where('slug', $slug)->firstOrFail();

        if ($link->is_claimed) {
            return redirect()->route('link.show', $slug);
        }

        $validated = $request->validate([
            'url_gmb' => ['required', 'url', 'max:2048'],
            'pin'     => ['required', 'digits_between:4,6'],
        ], [
            'url_gmb.required' => 'Link Google Maps wajib diisi.',
            'url_gmb.url'      => 'Format URL tidak valid. Pastikan diawali https://',
            'pin.required'     => 'PIN wajib diisi.',
            'pin.digits_between' => 'PIN harus berupa angka 4–6 digit.',
        ]);

        $link->update([
            'url_gmb'    => $validated['url_gmb'],
            'pin'        => Hash::make($validated['pin']),
            'is_claimed' => true,
        ]);

        return view('success', compact('link'))
            ->with('success', 'Kartu Aktif! Silakan scan ulang kartu Anda untuk langsung diarahkan ke Google Maps.');
    }

    /**
     * GET /{slug}/edit
     * Tampilkan form verifikasi PIN untuk edit.
     */
    public function editVerify(string $slug)
    {
        $link = Link::where('slug', $slug)->firstOrFail();

        if (! $link->is_claimed) {
            return redirect()->route('link.show', $slug);
        }

        return view('edit-verify', compact('link'));
    }

    /**
     * POST /{slug}/edit
     * Verifikasi PIN, lalu tampilkan form edit atau proses update URL.
     */
    public function editUpdate(Request $request, string $slug)
    {
        $link = Link::where('slug', $slug)->firstOrFail();

        if (! $link->is_claimed) {
            return redirect()->route('link.show', $slug);
        }

        // Step 1: Verifikasi PIN saja (belum ada url_gmb baru)
        if (! $request->has('url_gmb')) {
            $request->validate([
                'pin' => ['required', 'digits_between:4,6'],
            ], [
                'pin.required'       => 'PIN wajib diisi.',
                'pin.digits_between' => 'PIN harus berupa angka 4–6 digit.',
            ]);

            if (! Hash::check($request->pin, $link->pin)) {
                return back()->withErrors(['pin' => 'PIN yang Anda masukkan salah. Coba lagi.'])->withInput();
            }

            // PIN valid – tampilkan form edit URL
            return view('edit-form', compact('link'));
        }

        // Step 2: Update URL (PIN sudah diverifikasi di step sebelumnya, re-verify untuk keamanan)
        $request->validate([
            'pin'     => ['required', 'digits_between:4,6'],
            'url_gmb' => ['required', 'url', 'max:2048'],
        ], [
            'url_gmb.required' => 'Link Google Maps wajib diisi.',
            'url_gmb.url'      => 'Format URL tidak valid. Pastikan diawali https://',
            'pin.required'     => 'PIN wajib diisi.',
            'pin.digits_between' => 'PIN harus berupa angka 4–6 digit.',
        ]);

        if (! Hash::check($request->pin, $link->pin)) {
            return back()->withErrors(['pin' => 'Sesi verifikasi PIN tidak valid. Silakan mulai ulang.'])->withInput();
        }

        $link->update(['url_gmb' => $request->url_gmb]);

        return redirect()->route('link.show', $slug)
            ->with('success', 'Link Google Maps berhasil diperbarui!');
    }
}
