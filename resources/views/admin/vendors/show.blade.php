<x-app-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">View Vendor Profile</h1>
        <span class="px-3 py-1 text-xs font-semibold rounded-full capitalize
            @if($user->status == 'approved') bg-green-100 text-green-800 @endif
            @if($user->status == 'pending') bg-yellow-100 text-yellow-800 @endif
            @if($user->status == 'rejected') bg-red-100 text-red-800 @endif">
            {{ $user->status }}
        </span>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="p-4 sm:p-8 bg-white dark:bg-gray-900 shadow sm:rounded-lg" x-data="{ activeTab: 'company' }">
        <!-- Tab Navigation -->
        <div class="border-b border-gray-200 dark:border-gray-700">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <button @click="activeTab = 'company'"
                        :class="activeTab === 'company' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Company Details
                </button>
                <button @click="activeTab = 'user'"
                        :class="activeTab === 'user' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    User Details
                </button>
                <button @click="activeTab = 'directors'"
                        :class="activeTab === 'directors' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Director & Shareholder Information
                </button>
            </nav>
        </div>

        <!-- Tab Content -->
        <div class="pt-6">
            <!-- Company Details Section -->
            <div x-show="activeTab === 'company'">
                <div class="mb-6">
                    <x-input-label for="company_name" :value="__('Company Name')" />
                    <x-text-input class="block mt-1 w-full" type="text" :value="$user->vendorProfile->company_name" disabled />
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div><x-input-label :value="__('Company Phone Number')" /><x-text-input class="mt-1 w-full" :value="$user->vendorProfile->company_phone" disabled /></div>
                    <div><x-input-label :value="__('Company Email Address')" /><x-text-input class="mt-1 w-full" :value="$user->vendorProfile->company_email" disabled /></div>
                    <div><x-input-label :value="__('Company Fax Number')" /><x-text-input class="mt-1 w-full" :value="$user->vendorProfile->company_fax" disabled /></div>
                    <div><x-input-label :value="__('Company Registration Number')" /><x-text-input class="mt-1 w-full" :value="$user->vendorProfile->company_registration_number" disabled /></div>
                    <div><x-input-label :value="__('Company Type')" /><x-text-input class="mt-1 w-full" :value="$user->vendorProfile->company_type" disabled /></div>
                </div>
                <div class="mb-6">
                    <x-input-label :value="__('Company Profile')" /><textarea rows="4" class="block mt-1 w-full border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 dark:text-gray-300 rounded-md shadow-sm" disabled>{{ $user->vendorProfile->company_profile }}</textarea>
                </div>
                <h4 class="font-semibold text-gray-800 dark:text-white mb-4">Company Address</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div><x-input-label :value="__('Address 1')" /><x-text-input class="mt-1 w-full" :value="$user->vendorProfile->address_1" disabled /></div>
                    <div><x-input-label :value="__('Address 2 (Optional)')" /><x-text-input class="mt-1 w-full" :value="$user->vendorProfile->address_2" disabled /></div>
                    <div><x-input-label :value="__('Address 3 (Optional)')" /><x-text-input class="mt-1 w-full" :value="$user->vendorProfile->address_3" disabled /></div>
                    <div><x-input-label :value="__('City')" /><x-text-input class="mt-1 w-full" :value="$user->vendorProfile->city" disabled /></div>
                    <div><x-input-label :value="__('State / Province')" /><x-text-input class="mt-1 w-full" :value="$user->vendorProfile->state" disabled /></div>
                    <div><x-input-label :value="__('Zip / Postal Code')" /><x-text-input class="mt-1 w-full" :value="$user->vendorProfile->zip_code" disabled /></div>
                    <div><x-input-label :value="__('Country')" /><x-text-input class="mt-1 w-full" :value="$user->vendorProfile->country" disabled /></div>
                </div>
            </div>

            <!-- User Details Section -->
            <div x-show="activeTab === 'user'" style="display: none;">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <x-input-label for="name" :value="__('User Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" :value="$user->name" disabled />
                    </div>
                    <div>
                        <x-input-label for="email" :value="__('User Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" :value="$user->email" disabled />
                    </div>
                </div>
            </div>

            <!-- Director/Shareholder Information Table -->
            <div x-show="activeTab === 'directors'" style="display: none;">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Fullname</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Status</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">NRIC/Passport</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Shares (%)</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($user->vendorProfile->directorShareholders as $director)
                                <tr>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $director->fullname }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $director->status }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $director->nric_passport }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $director->ordinary_shares + $director->preference_shares }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-2 text-center text-gray-500">No director information provided.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-6 pt-6 border-t dark:border-gray-700">
                <h3 class="font-semibold text-lg text-gray-800 dark:text-white mb-2">Financial Performance</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">This is the financial information submitted by the applicant.</p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-1 space-y-10 mt-10">
                        <p class="font-medium text-gray-700 dark:text-gray-300">1) Year :</p>
                        <p class="font-medium text-gray-700 dark:text-gray-300">2) Current Asset :</p>
                        <p class="font-medium text-gray-700 dark:text-gray-300">3) Total Non-current Asset :</p>
                    </div>

                    <div class="md:col-span-1 space-y-4">
                        <h4 class="font-semibold text-gray-800 dark:text-white">Current Year</h4>
                        <div>
                            <x-text-input type="text" class="w-full" :value="$user->vendorProfile?->current_financial_year" disabled />
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">RM</span>
                            <x-text-input type="text" class="pl-10 w-full" :value="number_format($user->vendorProfile?->current_assets, 2)" disabled />
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">RM</span>
                            <x-text-input type="text" class="pl-10 w-full" :value="number_format($user->vendorProfile?->current_non_current_assets, 2)" disabled />
                        </div>
                    </div>

                    <div class="md:col-span-1 space-y-4">
                        <h4 class="font-semibold text-gray-800 dark:text-white">Previous Year</h4>
                        <div>
                            <x-text-input type="text" class="w-full" :value="$user->vendorProfile?->previous_financial_year" disabled />
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">RM</span>
                            <x-text-input type="text" class="pl-10 w-full" :value="number_format($user->vendorProfile?->previous_assets, 2)" disabled />
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">RM</span>
                            <x-text-input type="text" class="pl-10 w-full" :value="number_format($user->vendorProfile?->previous_non_current_assets, 2)" disabled />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Financial Performance (Read-Only Version for show.blade.php) -->
        <div class="mt-6 pt-6 border-t dark:border-gray-700">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-white mb-2">Financial Performance</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">This is the financial information submitted by the applicant.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-2">
                <!-- Labels Column -->
                <div class="md:col-span-1 space-y-4 flex flex-col justify-end">
                    <p class="font-medium text-gray-700 dark:text-gray-300 h-10 flex items-center">1) Year :</p>
                    <p class="font-medium text-gray-700 dark:text-gray-300 h-10 flex items-center">2) Current Asset :</p>
                    <p class="font-medium text-gray-700 dark:text-gray-300 h-10 flex items-center">3) Total Non-current Asset :</p>
                    <p class="font-medium text-gray-700 dark:text-gray-300 h-10 flex items-center">4) Total Asset :</p>
                    <p class="font-medium text-gray-700 dark:text-gray-300 h-10 flex items-center">5) Total Current Liability :</p>
                    <p class="font-medium text-gray-700 dark:text-gray-300 h-10 flex items-center">6) Total Non-current Liability :</p>
                    <p class="font-medium text-gray-700 dark:text-gray-300 h-10 flex items-center">7) Total Liability :</p>
                    <p class="font-medium text-gray-700 dark:text-gray-300 h-10 flex items-center">8) Total Equity :</p>
                    <p class="font-medium text-gray-700 dark:text-gray-300 h-10 flex items-center">9) Retain Earning :</p>
                    <p class="font-medium text-gray-700 dark:text-gray-300 h-10 flex items-center">10) Revenue :</p>
                    <p class="font-medium text-gray-700 dark:text-gray-300 h-10 flex items-center">11) Cost of Sales :</p>
                    <p class="font-medium text-gray-700 dark:text-gray-300 h-10 flex items-center">12) Gross Profit / Loss :</p>
                </div>

                <!-- Current Year Column -->
                <div class="md:col-span-1 space-y-4">
                    <h4 class="font-semibold text-gray-800 dark:text-white h-10 flex items-center">Current Year</h4>
                    <div>
                        <x-text-input type="text" class="h-10 w-full" :value="$user->vendorProfile?->current_financial_year" disabled />
                    </div>
                    @php $currentFields = ['current_assets', 'current_non_current_assets', 'current_total_assets', 'current_current_liabilities', 'current_non_current_liabilities', 'current_total_liabilities', 'current_total_equity', 'current_retained_earnings', 'current_revenue', 'current_cost_of_sales', 'current_gross_profit_loss']; @endphp
                    @foreach($currentFields as $field)
                    <div class="relative"><span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">RM</span><x-text-input type="text" class="h-10 pl-10 w-full" :value="number_format($user->vendorProfile?->{$field} ?? 0, 2)" disabled /></div>
                    @endforeach
                </div>

                <!-- Previous Year Column -->
                <div class="md:col-span-1 space-y-4">
                    <h4 class="font-semibold text-gray-800 dark:text-white h-10 flex items-center">Previous Year</h4>
                    <div>
                        <x-text-input type="text" class="h-10 w-full" :value="$user->vendorProfile?->previous_financial_year" disabled />
                    </div>
                    @php $previousFields = ['previous_assets', 'previous_non_current_assets', 'previous_total_assets', 'previous_current_liabilities', 'previous_non_current_liabilities', 'previous_total_liabilities', 'previous_total_equity', 'previous_retained_earnings', 'previous_revenue', 'previous_cost_of_sales', 'previous_gross_profit_loss']; @endphp
                    @foreach($previousFields as $field)
                    <div class="relative"><span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">RM</span><x-text-input type="text" class="h-10 pl-10 w-full" :value="number_format($user->vendorProfile?->{$field} ?? 0, 2)" disabled /></div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end mt-6 space-x-4 border-t border-gray-200 dark:border-gray-700 pt-6">
            @if($user->status == 'pending')
                <form action="{{ route('admin.vendors.approve', $user) }}" method="POST">
                   @csrf
                   <x-primary-button class="bg-green-600 hover:bg-green-700">
                       {{ __('Approve') }}
                   </x-primary-button>
                </form>
                <form action="{{ route('admin.vendors.reject', $user) }}" method="POST">
                   @csrf
                   <x-danger-button>
                       {{ __('Reject') }}
                   </x-danger-button>
                </form>
            @endif
            <a href="{{ route('admin.vendors.edit', $user) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Edit Profile
            </a>
        </div>
    </div>
</x-app-layout>