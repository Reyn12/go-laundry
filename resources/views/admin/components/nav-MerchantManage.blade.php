<div class="border-b border-gray-200 dark:border-gray-700 flex justify-center overflow-x-auto ">
    <nav class="flex px-2 md:px-6 w-full justify-between md:mx-96 min-w-max m-4 md:m-0 " aria-label="Tabs">
        <a href="{{ route('admin.dashboard.merchant-manage.all') }}" 
           class="border-b-2 whitespace-nowrap {{ request()->routeIs('admin.dashboard.merchant-manage.index') || request()->routeIs('admin.dashboard.merchant-manage.all') ? 'border-blue-500 text-blue-600 dark:text-blue-400' : 'border-transparent text-gray-500 dark:text-gray-400 hover:border-gray-300 dark:hover:border-gray-500 hover:text-gray-700 dark:hover:text-gray-300' }} py-2 md:py-4 px-2 md:px-4 text-xs md:text-sm font-medium">
            All Merchant
        </a>
        <a href="{{ route('admin.dashboard.merchant-manage.pending') }}" 
           class="border-b-2 whitespace-nowrap {{ request()->routeIs('admin.dashboard.merchant-manage.pending') ? 'border-blue-500 text-blue-600 dark:text-blue-400' : 'border-transparent text-gray-500 dark:text-gray-400 hover:border-gray-300 dark:hover:border-gray-500 hover:text-gray-700 dark:hover:text-gray-300' }} py-2 md:py-4 px-2 md:px-4 text-xs md:text-sm font-medium">
            Pending
        </a>
        <a href=" {{ route('admin.dashboard.merchant-manage.verified') }} " 
        class="border-b-2 whitespace-nowrap {{ request()->routeIs('admin.dashboard.merchant-manage.verified') ? 'border-blue-500 text-blue-600 dark:text-blue-400' : 'border-transparent text-gray-500 dark:text-gray-400 hover:border-gray-300 dark:hover:border-gray-500 hover:text-gray-700 dark:hover:text-gray-300' }} py-2 md:py-4 px-2 md:px-4 text-xs md:text-sm font-medium">
            Verified
        </a>
</div>