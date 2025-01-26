<form id="signupForm" class="space-y-5" action="{{ route('admin.register.submit') }}" method="POST" novalidate>
    @csrf
    <div class="relative">
            <input
                type="text"
                placeholder="Nama Lengkap"
                name="fullName"
                required
                class="w-full p-4 rounded-xl border-2 border-gray-100 bg-gray-50 focus:bg-white focus:border-blue-500 transition-all duration-200 outline-none text-gray-700"
            />
            <div class="error-message mt-1"></div>
    </div>
        
    <div class="relative">
            <input
                type="text"
                placeholder="Username"
                name="username"
                required
                class="w-full p-4 rounded-xl border-2 border-gray-100 bg-gray-50 focus:bg-white focus:border-blue-500 transition-all duration-200 outline-none text-gray-700"
            />
            <div class="error-message mt-1"></div>
    </div>
    
    <div class="relative">
        <input
            type="email"
            placeholder="Email"
            name="email"
            required
            class="w-full p-4 rounded-xl border-2 border-gray-100 bg-gray-50 focus:bg-white focus:border-blue-500 transition-all duration-200 outline-none text-gray-700"
        />
        <div class="error-message mt-1"></div>
    </div>

    <div class="relative">
        <input
            type="text"
            placeholder="Nomor Telepon"
            name="phone"
            required
            class="w-full p-4 rounded-xl border-2 border-gray-100 bg-gray-50 focus:bg-white focus:border-blue-500 transition-all duration-200 outline-none text-gray-700"
            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
            maxlength="15"
        />
        <div class="error-message mt-1"></div>
    </div>

    <div class="relative">
        <input
            type="text"
            placeholder="Alamat"
            name="address"
            required
            class="w-full p-4 rounded-xl border-2 border-gray-100 bg-gray-50 focus:bg-white focus:border-blue-500 transition-all duration-200 outline-none text-gray-700"
        />
        <div class="error-message mt-1"></div>
    </div>

    <div class="relative">
        <input
            type="password"
            placeholder="Password"
            name="password"
            required
            minlength="8"
            class="w-full p-4 rounded-xl border-2 border-gray-100 bg-gray-50 focus:bg-white focus:border-blue-500 transition-all duration-200 outline-none text-gray-700"
        />
        <div class="error-message mt-1"></div>
    </div>
    
    <div class="relative">
        <input
            type="password"
            placeholder="Konfirmasi Password"
            name="password_confirmation"
            required
            minlength="8"
            class="w-full p-4 rounded-xl border-2 border-gray-100 bg-gray-50 focus:bg-white focus:border-blue-500 transition-all duration-200 outline-none text-gray-700"
        />
        <div class="error-message mt-1"></div>
    </div>

    <div class="flex items-center">
        <input 
            type="checkbox" 
            name="terms"
            required
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