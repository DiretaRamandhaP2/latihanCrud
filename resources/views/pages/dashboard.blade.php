<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<style type="text/tailwindcss">
    @theme {
        --color-clifford: #da373d;
    }
</style>

<body>
    <div class="min-h-screen bg-[#FAF7F0] p-6">

        <div class="flex justify-between items-center mb-10 border-b border-[#D8D2C2] pb-5">
            <div>
                <h1 class="text-2xl font-bold text-[#4A4947]">Arsip Digital Hub</h1>
                <p class="text-sm text-gray-500">Selamat datang, {{ auth()->user()->name ?? 'Tamu' }}</p>
            </div>

            @auth
                <div class="flex items-center gap-4">
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('document.create') }}">
                            <button class="bg-[#B17457] text-white px-4 py-2 rounded-md hover:opacity-90 transition">
                                + Tambah Dokumen Baru
                            </button>
                        </a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST">@csrf <button
                            class="text-[#4A4947] underline">Keluar</button>
                    </form>
                </div>
            @else
                <div class="">
                    <a href="{{ route('register') }}" class="bg-[#4A4947] text-white px-6 py-2 rounded-md">Daftar</a>
                    <a href="{{ route('login') }}" class="bg-[#4A4947] text-white px-6 py-2 rounded-md">Login Staf</a>
                </div>
            @endauth
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($documents as $doc)
                <div class="bg-white p-5 rounded-lg border border-[#D8D2C2] shadow-sm hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-4">
                        @if ($doc->category === 'public')
                            <span
                                class="bg-green-100 text-green-700 text-[10px] uppercase px-2 py-1 rounded-full font-bold">Public</span>
                        @elseif($doc->category === 'internal')
                            <span
                                class="bg-blue-100 text-blue-700 text-[10px] uppercase px-2 py-1 rounded-full font-bold">Internal</span>
                        @else
                            <span
                                class="bg-red-100 text-red-700 text-[10px] uppercase px-2 py-1 rounded-full font-bold">Confidential</span>
                        @endif

                        @auth
                            @if (auth()->user()->role === 'admin')
                                <div class="flex gap-2 text-xs">
                                    <a href="{{ route('document.edit', $doc->id) }}">
                                        <button class="text-blue-500 hover:underline">Edit</button>
                                    </a>
                                    <form action="{{ route('document.destroy', $doc->id) }}" method="POST">@csrf @method('DELETE')
                                        <button class="text-red-500 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">Hapus</button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>

                    <h3 class="text-lg font-semibold text-[#4A4947] mb-2">{{ $doc->title }}</h3>
                    <p class="text-sm text-gray-400 mb-4 line-clamp-2">{{ $doc->description }}</p>

                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-[11px] text-gray-400">{{ $doc->created_at->format('d M Y') }}</span>
                        <a href="#"
                            class="text-[#B17457] font-medium text-sm flex items-center gap-1 hover:gap-2 transition-all">
                            Buka Dokumen <span>→</span>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</body>

</html>
