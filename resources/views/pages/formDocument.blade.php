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
    <div class="min-h-screen bg-[#FAF7F0] py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md border border-[#D8D2C2] overflow-hidden">

            <div class="bg-[#4A4947] p-6">
                <h2 class="text-xl font-bold text-[#FAF7F0]">
                    {{ isset($document) ? 'Edit Dokumen: ' . $document->title : 'Unggah Dokumen Baru' }}
                </h2>
                <p class="text-sm text-[#D8D2C2] mt-1 italic">
                    Pastikan informasi dokumen sudah sesuai sebelum disimpan.
                </p>
            </div>

            <form action="{{ isset($document) ? route('document.update', $document->id) : route('document.store') }}"
                method="POST" enctype="multipart/form-data" class="p-8 space-y-6">

                @csrf
                @if (isset($document))
                    @method('PUT')
                @endif

                <div>
                    <label class="block text-sm font-semibold text-[#4A4947] mb-2">Judul Dokumen</label>
                    <input type="text" name="title" value="{{ old('title', $document->title ?? '') }}"
                        class="w-full px-4 py-3 rounded-lg border border-[#D8D2C2] focus:ring-2 focus:ring-[#B17457] outline-none transition"
                        placeholder="Contoh: Laporan Keuangan Q4 2025" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#4A4947] mb-2">Klasifikasi Akses</label>
                    <select name="category"
                        class="w-full px-4 py-3 rounded-lg border border-[#D8D2C2] focus:ring-2 focus:ring-[#B17457] outline-none bg-white">
                        <option value="public"
                            {{ old('category', $document->category ?? '') == 'public' ? 'selected' : '' }}>🟢 Public
                            (Dapat dilihat semua orang)</option>
                        <option value="internal"
                            {{ old('category', $document->category ?? '') == 'internal' ? 'selected' : '' }}>🔵
                            Internal (Hanya Staff & Admin)</option>
                        <option value="confidential"
                            {{ old('category', $document->category ?? '') == 'confidential' ? 'selected' : '' }}>🔴
                            Confidential (Hanya Admin)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#4A4947] mb-2">Deskripsi Singkat</label>
                    <textarea name="description" rows="3"
                        class="w-full px-4 py-3 rounded-lg border border-[#D8D2C2] focus:ring-2 focus:ring-[#B17457] outline-none transition"
                        placeholder="Jelaskan isi dokumen secara singkat...">{{ old('description', $document->description ?? '') }}</textarea>
                </div>

                <div class="p-4 border-2 border-dashed border-[#D8D2C2] rounded-lg bg-gray-50">
                    <label class="block text-sm font-semibold text-[#4A4947] mb-2">File Dokumen (PDF/DOCX)</label>
                    <input type="file" name="file_path"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#B17457] file:text-white hover:file:opacity-80 cursor-pointer">
                    @if (isset($document))
                        <p class="mt-2 text-xs text-gray-500 italic">Kosongkan jika tidak ingin mengganti file.</p>
                    @endif
                </div>

                <div class="flex items-center justify-end gap-4 pt-4 border-t border-[#D8D2C2]">
                    <a href="{{ route('dashboard') }}"
                        class="text-sm font-medium text-[#4A4947] hover:underline">Batal</a>
                    <button type="submit"
                        class="bg-[#4A4947] hover:bg-[#B17457] text-white px-8 py-3 rounded-lg font-bold shadow-lg transition duration-300">
                        {{ isset($document) ? 'Simpan Perubahan' : 'Upload Sekarang' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
