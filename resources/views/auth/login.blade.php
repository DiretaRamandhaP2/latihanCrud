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
    <div class="min-h-screen flex items-center justify-center bg-[#FAF7F0] font-sans">
        <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md border border-[#D8D2C2]">

            <div class="text-center mb-10">
                <h1 class="text-2xl font-bold text-[#4A4947] tracking-tight">Sistem Arsip Digital</h1>
                <p class="text-[#B17457] text-sm mt-2">Silahkan masuk ke akun Anda</p>
            </div>

            <form action="{{ route('auth.login') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block text-sm font-semibold text-[#4A4947] mb-2">Alamat Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-3 rounded-md border border-[#D8D2C2] focus:ring-2 focus:ring-[#B17457] focus:border-transparent outline-none transition duration-200"
                        placeholder="nama@perusahaan.com" required>
                </div>

                <div class="mb-6">
                    <div class="flex justify-between mb-2">
                        <label for="password" class="block text-sm font-semibold text-[#4A4947]">Password</label>
                        <a href="#" class="text-xs text-[#B17457] hover:underline">Lupa Password?</a>
                    </div>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-3 rounded-md border border-[#D8D2C2] focus:ring-2 focus:ring-[#B17457] focus:border-transparent outline-none transition duration-200"
                        placeholder="••••••••" required>
                </div>

                <button type="submit"
                    class="w-full bg-[#4A4947] text-[#FAF7F0] font-bold py-3 rounded-md hover:bg-[#B17457] transition duration-300 shadow-lg">
                    Masuk ke Sistem
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-[#D8D2C2] text-center">
                <p class="text-xs text-gray-500 uppercase tracking-widest">Enterprise Solution v1.0</p>
            </div>
        </div>
    </div>
</body>

</html>
