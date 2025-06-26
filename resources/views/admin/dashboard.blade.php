<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Pending Applications Card -->
         <div class="p-4 sm:p-8 bg-white dark:bg-gray-900 shadow sm:rounded-lg">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                Pending Applications
            </h2>
            <div class="text-5xl font-bold text-gray-800 dark:text-white">
                {{ \App\Models\User::where('role', 'vendor')->where('status', 'pending')->count() }}
            </div>
            <p class="text-gray-600 dark:text-gray-400 mt-2">New vendors waiting for approval.</p>
            <a href="{{ route('admin.vendors.index') }}" class="inline-block mt-4 text-teal-600 dark:text-teal-500 hover:underline">Manage Applications &rarr;</a>
        </div>
         <!-- Total Vendors Card -->
         <div class="p-4 sm:p-8 bg-white dark:bg-gray-900 shadow sm:rounded-lg">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                Total Approved Vendors
            </h2>
            <div class="text-5xl font-bold text-gray-800 dark:text-white">
                {{ \App\Models\User::where('role', 'vendor')->where('status', 'approved')->count() }}
            </div>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Currently active vendors in the portal.</p>
            <a href="{{ route('admin.vendors.index') }}" class="inline-block mt-4 text-teal-600 dark:text-teal-500 hover:underline">View All Vendors &rarr;</a>
        </div>
    </div>
</x-app-layout>