<form id="signupForm" class="space-y-5" novalidate>
    <div class="flex gap-4">
        <div class="w-1/2 relative">
            <input
                type="text"
                placeholder="Nama depan"
                name="firstName"
                class="w-full p-4 rounded-xl border-2 border-gray-100 bg-gray-50 focus:bg-white focus:border-blue-500 transition-all duration-200 outline-none text-gray-700"
            />
            <span class="error-message">Nama depan harus diisi</span>
        </div>
        <div class="w-1/2 relative">
            <input
                type="text"
                placeholder="Nama belakang"
                name="lastName"
                class="w-full p-4 rounded-xl border-2 border-gray-100 bg-gray-50 focus:bg-white focus:border-blue-500 transition-all duration-200 outline-none text-gray-700"
            />
            <span class="error-message">Nama belakang harus diisi</span>
        </div>
    </div>
    
    <div class="relative">
        <input
            type="email"
            placeholder="Email"
            name="email"
            class="w-full p-4 rounded-xl border-2 border-gray-100 bg-gray-50 focus:bg-white focus:border-blue-500 transition-all duration-200 outline-none text-gray-700"
        />
        <span class="error-message">Email harus diisi dengan format yang benar</span>
    </div>
    
    <div class="relative">
        <input
            type="password"
            placeholder="Password"
            name="password"
            class="w-full p-4 rounded-xl border-2 border-gray-100 bg-gray-50 focus:bg-white focus:border-blue-500 transition-all duration-200 outline-none text-gray-700"
        />
        <span class="error-message">Password minimal 8 karakter</span>
    </div>
    
    <div class="relative">
        <input
            type="password"
            placeholder="Konfirmasi Password"
            name="confirmPassword"
            class="w-full p-4 rounded-xl border-2 border-gray-100 bg-gray-50 focus:bg-white focus:border-blue-500 transition-all duration-200 outline-none text-gray-700"
        />
        <span class="error-message">Password tidak cocok</span>
    </div>

    <div class="flex items-center">
        <input 
            type="checkbox" 
            name="terms"
            class="w-5 h-5 mr-3 rounded text-blue-500 border-2 border-gray-300 focus:ring-blue-500 cursor-pointer" 
        />
        <span class="text-gray-600">
            Saya menyetujui 
            <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">syarat & ketentuan</a>
        </span>
    </div>

    <button
        type="submit"
        class="w-full bg-blue-700 hover:bg-blue-500 text-white font-semibold p-3 rounded-lg transition duration-200 shadow-lg h-20 text-2xl"
    >
        BUAT AKUN
    </button>
</form>