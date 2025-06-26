<x-app-layout>
    <div class="space-y-6">
        <!-- Current Status Card -->
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-900 shadow sm:rounded-lg">
            <div class="flex items-center space-x-4">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Current Status:
                </h2>
                <span class="px-3 py-1 text-xs font-semibold rounded-full
                    @if(Auth::user()->status == 'approved') bg-green-100 text-green-800 @endif
                    @if(Auth::user()->status == 'pending') bg-yellow-100 text-yellow-800 @endif
                    @if(Auth::user()->status == 'rejected') bg-red-100 text-red-800 @endif">
                    {{ ucfirst(Auth::user()->status) }}
                </span>
            </div>
        </div>

        <!-- Available Tenders Card -->
         <div class="p-4 sm:p-8 bg-white dark:bg-gray-900 shadow sm:rounded-lg">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                Available Tenders
            </h2>
            <div class="text-5xl font-bold text-gray-800 dark:text-white">
                0
            </div>
            <p class="text-gray-600 dark:text-gray-400 mt-2">No open tenders matching your service profile.</p>
            <a href="#" class="inline-block mt-4 text-teal-600 dark:text-teal-500 hover:underline">View All Tenders &rarr;</a>
        </div>
    </div>
</x-app-layout>