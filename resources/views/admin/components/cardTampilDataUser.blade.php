{{-- Card Tampil Data Users --}}
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/icons/iconUserManage.svg') }}" alt="Users" class="w-6 h-6 dark:invert">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Data Users</h2>
        </div>
        <select onchange="window.location.href='{{ route('admin.dashboard.user-manage.index') }}?role=' + this.value"
                class="rounded-lg border-gray-300 dark:border-gray-600 text-gray-600 dark:text-gray-300 bg-white dark:bg-gray-700 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="all" {{ $selectedRole === 'all' ? 'selected' : '' }}>Semua</option>
            <option value="admin" {{ $selectedRole === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="customer" {{ $selectedRole === 'customer' ? 'selected' : '' }}>Pelanggan</option>
        </select>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Peran</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tanggal Bergabung</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($users as $index => $user)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ ($users->currentPage() - 1) * $users->perPage() + $index + 1 }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $user->nama_lengkap }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200' : 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' }}">
                            {{ $user->role === 'admin' ? 'Admin' : 'Pelanggan' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ $user->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <button class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300">Edit</button>
                        <button class="ml-2 text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        @if ($users->hasPages())
            <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
                {{-- Previous Page Link --}}
                @if ($users->onFirstPage())
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 cursor-default rounded-md">
                        Previous
                    </span>
                @else
                    <a href="{{ $users->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md hover:text-gray-500 dark:hover:text-gray-200 focus:outline-none focus:ring-blue-300 focus:border-blue-300 active:bg-gray-100 dark:active:bg-gray-700 active:text-gray-700 dark:active:text-gray-300 transition ease-in-out duration-150">
                        Previous
                    </a>
                @endif

                {{-- Pagination Numbers --}}
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center">
                    <div>
                        <span class="relative z-0 inline-flex shadow-sm rounded-md gap-x-2">
                            @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                                @if ($page == $users->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 dark:bg-blue-500 border border-blue-600 dark:border-blue-500 rounded-md">
                                            {{ $page }}
                                        </span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        </span>
                    </div>
                </div>

                {{-- Next Page Link --}}
                @if ($users->hasMorePages())
                    <a href="{{ $users->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md hover:text-gray-500 dark:hover:text-gray-200 focus:outline-none focus:ring-blue-300 focus:border-blue-300 active:bg-gray-100 dark:active:bg-gray-700 active:text-gray-700 dark:active:text-gray-300 transition ease-in-out duration-150">
                        Next
                    </a>
                @else
                    <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 cursor-default rounded-md">
                        Next
                    </span>
                @endif
            </nav>
        @endif
    </div>
</div>