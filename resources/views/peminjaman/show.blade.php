<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Peminjaman
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <h3 class="text-lg font-bold mb-6">
                    Informasi Peminjaman
                </h3>

                <div class="space-y-4">

                    <div>
                        <strong>ID Peminjaman:</strong>
                        {{ $peminjaman->id }}
                    </div>

                    <div>
                        <strong>Peminjam:</strong>
                        {{ $peminjaman->user?->name ?? 'Tidak diketahui' }}
                    </div>

                    <div>
                        <strong>Buku:</strong>
                        {{ $peminjaman->buku?->judul ?? 'Tidak ditemukan' }}
                    </div>

                    <div>
                        <strong>Status:</strong>
                        {{ $peminjaman->status }}
                    </div>

                    <div>
                        <strong>Tanggal Pinjam:</strong>
                        {{ $peminjaman->tanggal_pinjam }}
                    </div>

                    <div>
                        <strong>Tanggal Kembali:</strong>
                        {{ $peminjaman->tanggal_kembali ?? '-' }}
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>