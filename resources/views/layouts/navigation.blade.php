
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <!-- Navbar Utama -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>

            <!-- Menu Desktop -->
            <div class="hidden sm:flex sm:items-center sm:ms-8 space-x-6">

                @if(auth()->user()->hasRole('admin'))
                    <x-nav-link :href="route('admin.dashboard')"
                        :active="request()->routeIs('admin.dashboard')">
                        Dashboard Admin
                    </x-nav-link>
                @elseif(auth()->user()->hasRole('petugas'))
                    <x-nav-link :href="route('petugas.dashboard')"
                        :active="request()->routeIs('petugas.dashboard')">
                        Dashboard Petugas
                    </x-nav-link>
                @else
                    <x-nav-link :href="route('siswa.dashboard')"
                        :active="request()->routeIs('siswa.dashboard')">
                        Dashboard
                    </x-nav-link>
                @endif

                <x-nav-link :href="route('buku.index')"
                    :active="request()->routeIs('buku.*')">
                    Daftar Buku
                </x-nav-link>

                @can('kelola data pengguna')
                    <x-nav-link :href="route('admin.users')"
                        :active="request()->routeIs('admin.users')">
                        Kelola Pengguna
                    </x-nav-link>
                @endcan

                @can('kelola peminjaman')
                    <x-nav-link :href="route('peminjaman.index')"
                        :active="request()->routeIs('peminjaman.index')">
                        Peminjaman
                    </x-nav-link>
                @endcan

                @can('kelola pengembalian')
                    <x-nav-link :href="route('pengembalian.index')"
                        :active="request()->routeIs('pengembalian.index')">
                        Pengembalian
                    </x-nav-link>
                @endcan

                @can('melihat status peminjaman sendiri')
                    <x-nav-link :href="route('peminjaman.status.sendiri')"
                        :active="request()->routeIs('peminjaman.status.sendiri')">
                        Status Peminjaman
                    </x-nav-link>
                @endcan

                @can('melihat riwayat peminjaman sendiri')
                    <x-nav-link :href="route('peminjaman.riwayat.sendiri')"
                        :active="request()->routeIs('peminjaman.riwayat.sendiri')">
                        Riwayat Saya
                    </x-nav-link>
                @endcan

                @can('lihat laporan perpustakaan')
                    <x-nav-link :href="route('laporan.index')"
                        :active="request()->routeIs('laporan.index')">
                        Laporan
                    </x-nav-link>
                @endcan
            </div>

            <!-- Dropdown Desktop -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white hover:text-gray-700 rounded-md">
                            {{ Auth::user()->name }}

                            <svg class="ms-2 h-4 w-4 fill-current"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profil.saya')">
                            Profil Saya
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Tombol Hamburger Mobile -->
            <div class="flex items-center sm:hidden">
                <button
                    @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none"
                    aria-label="Buka menu navigasi">

                    <svg class="h-6 w-6" stroke="currentColor"
                        fill="none" viewBox="0 0 24 24">

                        <path
                            :class="{'hidden': open, 'inline-flex': !open}"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path
                            :class="{'hidden': !open, 'inline-flex': open}"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Menu Navigasi Mobile -->
    <div x-show="open"
        x-transition
        class="sm:hidden border-t border-gray-100 bg-white">

        <div class="pt-2 pb-3 space-y-1">

            @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('admin.dashboard') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    Dashboard Admin
                </a>
            @elseif(auth()->user()->hasRole('petugas'))
                <a href="{{ route('petugas.dashboard') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    Dashboard Petugas
                </a>
            @else
                <a href="{{ route('siswa.dashboard') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    Dashboard
                </a>
            @endif

            <a href="{{ route('buku.index') }}"
                class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                Daftar Buku
            </a>

            @can('kelola data pengguna')
                <a href="{{ route('admin.users') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    Kelola Pengguna
                </a>
            @endcan

            @can('kelola peminjaman')
                <a href="{{ route('peminjaman.index') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    Peminjaman
                </a>
            @endcan

            @can('kelola pengembalian')
                <a href="{{ route('pengembalian.index') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    Pengembalian
                </a>
            @endcan

            @can('melihat status peminjaman sendiri')
                <a href="{{ route('peminjaman.status.sendiri') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    Status Peminjaman
                </a>
            @endcan

            @can('melihat riwayat peminjaman sendiri')
                <a href="{{ route('peminjaman.riwayat.sendiri') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    Riwayat Saya
                </a>
            @endcan

            @can('lihat laporan perpustakaan')
                <a href="{{ route('laporan.index') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    Laporan
                </a>
            @endcan

        </div>

        <!-- Informasi Pengguna Mobile -->
        <div class="border-t border-gray-200 pt-4 pb-4">

            <div class="px-4">
                <div class="font-medium text-base text-gray-800">
                    {{ Auth::user()->name }}
                </div>

                <div class="font-medium text-sm text-gray-500">
                    {{ Auth::user()->email }}
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profil.saya') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    Profil Saya
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                        Log Out
                    </button>
                </form>
            </div>

        </div>
    </div>

</nav>
