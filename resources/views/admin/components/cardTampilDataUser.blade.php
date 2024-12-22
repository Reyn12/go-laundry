{{-- Card Tampil Data Users --}}
<div class="bg-white rounded-xl shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/icons/iconUserManage.svg') }}" alt="Users" class="w-6 h-6">
            <h2 class="text-lg font-semibold">Data Users</h2>
        </div>
        <select onchange="window.location.href='{{ route('admin.dashboard.user-manage.index') }}?role=' + this.value"
                class="rounded-lg border-gray-300 text-gray-600 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="all" {{ $selectedRole === 'all' ? 'selected' : '' }}>Semua</option>
            <option value="admin" {{ $selectedRole === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="customer" {{ $selectedRole === 'customer' ? 'selected' : '' }}>Pelanggan</option>
        </select>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peran</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Bergabung</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $index => $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ ($users->currentPage() - 1) * $users->perPage() + $index + 1 }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $user->nama_lengkap }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-blue-600">{{ $user->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 
                               ($user->role === 'merchant' ? 'bg-green-100 text-green-800' : 
                                'bg-blue-100 text-blue-800') }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button class="bg-green-100 text-green-800 hover:bg-green-200 px-4 py-2 rounded-lg transition-colors duration-200">
                            Edit
                        </button>
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
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-default rounded-lg">
                        Previous
                    </span>
                @else
                    <a href="{{ $users->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-blue-50 hover:text-blue-700">
                        Previous
                    </a>
                @endif

                {{-- Pagination Elements --}}
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center">
                    <div>
                        <span class="relative z-0 inline-flex shadow-sm rounded-lg gap-x-3">
                            {{-- Previous Page Link --}}
                            @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                                @if ($page == $users->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-primary border border-primary rounded-lg">
                                            {{ $page }}
                                        </span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-blue-50 hover:text-blue-700 rounded-lg">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        </span>
                    </div>
                </div>

                {{-- Next Page Link --}}
                @if ($users->hasMorePages())
                    <a href="{{ $users->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-blue-50 hover:text-blue-700">
                        Next
                    </a>
                @else
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-default rounded-lg">
                        Next
                    </span>
                @endif
            </nav>
        @endif
    </div>
</div>