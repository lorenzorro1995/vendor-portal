<x-app-layout>
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Manage Vendors</h1>

    <div class="p-4 sm:p-8 bg-white dark:bg-gray-900 shadow sm:rounded-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
               <thead class="bg-gray-50 dark:bg-gray-800">
                   <tr>
                       <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                       <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Account</th>
                       <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Address</th>
                       <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">City/State/Zip</th>
                       <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                       <th scope="col" class="relative px-6 py-3">
                           <span class="sr-only">Actions</span>
                       </th>
                   </tr>
               </thead>
               <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                   @forelse ($vendors as $vendor)
                       @if($vendor->vendorProfile) <!-- Only show vendors who have completed their profile -->
                       <tr>
                           <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                               {{ $vendor->id }}
                           </td>
                           <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                               {{ $vendor->vendorProfile->company_name }}
                           </td>
                           <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                               {{ $vendor->vendorProfile->address_1 }}
                               @if($vendor->vendorProfile->address_2), {{ $vendor->vendorProfile->address_2 }}@endif
                               @if($vendor->vendorProfile->address_3), {{ $vendor->vendorProfile->address_3 }}@endif
                           </td>
                           <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                               {{ $vendor->vendorProfile->city }}, {{ $vendor->vendorProfile->state }} {{ $vendor->vendorProfile->zip_code }}
                           </td>
                           <td class="px-6 py-4 whitespace-nowrap">
                               <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full capitalize
                                   @if($vendor->status == 'approved') bg-green-100 text-green-800 @endif
                                   @if($vendor->status == 'pending') bg-yellow-100 text-yellow-800 @endif
                                   @if($vendor->status == 'rejected') bg-red-100 text-red-800 @endif">
                                   {{ $vendor->status }}
                               </span>
                           </td>
                           <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                               <a href="{{ route('admin.vendors.show', $vendor) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">View</a>
                           </td>
                       </tr>
                       @endif
                   @empty
                       <tr>
                           <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                               No vendor applications found.
                           </td>
                       </tr>
                   @endforelse
               </tbody>
            </table>
        </div>
    </div>
</x-app-layout>