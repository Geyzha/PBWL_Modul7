<?php

namespace App\Policies;

use App\Models\Peminjaman;
use App\Models\User;

class PeminjamanPolicy
{
    public function view(User $user, Peminjaman $peminjaman): bool
    {
        // Admin dan petugas dapat melihat semua peminjaman
        if ($user->hasRole('admin') || $user->hasRole('petugas')) {
            return true;
        }

        // Siswa hanya dapat melihat peminjaman miliknya sendiri
        return $peminjaman->anggota_id === $user->id;
    }
}