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
    <div class="min-h-screen flex items-center justify-center bg-[#FAF7F0] font-sans py-12 px-4">
        <div class="max-w-lg w-full bg-white p-10 rounded-xl shadow-lg border border-[#D8D2C2]">

            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-[#4A4947] tracking-tight">Daftar Akun Baru</h1>
                <p class="text-[#B17457] text-sm mt-2">Buat identitas akses arsip digital Anda</p>
            </div>

            <form action="{{ route('auth.register') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-[#4A4947] mb-2">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full px-4 py-3 rounded-lg border border-[#D8D2C2] focus:ring-2 focus:ring-[#B17457] outline-none transition"
                            placeholder="Masukkan nama sesuai identitas" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-[#4A4947] mb-2">Email Perusahaan</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full px-4 py-3 rounded-lg border border-[#D8D2C2] focus:ring-2 focus:ring-[#B17457] outline-none transition"
                            placeholder="nama@perusahaan.com" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-[#4A4947] mb-2">Jabatan / Role</label>
                        <select name="role"
                            class="w-full px-4 py-3 rounded-lg border border-[#D8D2C2] focus:ring-2 focus:ring-[#B17457] outline-none bg-white">
                            <option value="staff">Staff (Akses Internal)</option>
                            <option value="admin">Admin (Akses Full / CRUD)</option>
                        </select>
                        <p class="text-[10px] text-gray-400 mt-1 italic">*Pilihan ini biasanya diatur oleh sistem Admin
                            pusat.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#4A4947] mb-2">Password</label>
                        <input type="password" name="password"
                            class="w-full px-4 py-3 rounded-lg border border-[#D8D2C2] focus:ring-2 focus:ring-[#B17457] outline-none transition"
                            placeholder="••••••••" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#4A4947] mb-2">Konfirmasi</label>
                        <input type="password" name="password_confirmation"
                            class="w-full px-4 py-3 rounded-lg border border-[#D8D2C2] focus:ring-2 focus:ring-[#B17457] outline-none transition"
                            placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-[#4A4947] text-[#FAF7F0] font-bold py-3 rounded-lg hover:bg-[#B17457] transition duration-300 shadow-lg mb-6">
                    Buat Akun Sekarang
                </button>

                <p class="text-center text-sm text-gray-500">
                    Sudah punya akses? <a href="{{ route('login') }}"
                        class="text-[#B17457] font-semibold hover:underline">Masuk di sini</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>
