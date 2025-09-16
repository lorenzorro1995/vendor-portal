<x-app-layout>
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Vendor Registration Form</h1>

    <div class="p-4 sm:p-8 bg-white dark:bg-gray-900 shadow sm:rounded-lg">
        <p class="mb-6 text-gray-600 dark:text-gray-400">Please complete the form below to apply as a vendor.</p>

        <form method="POST" action="{{ route('vendor.profile.store') }}">
            @csrf

            <!-- User Details (Read-only for confirmation) -->
            <h3 class="font-semibold text-lg text-gray-800 dark:text-white mb-4 border-b pb-2 dark:border-gray-700">User Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <x-input-label for="name" :value="__('User Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" disabled />
                </div>
                <div>
                    <x-input-label for="email" :value="__('User Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" disabled />
                </div>
            </div>

            <!-- Company Details -->
            <h3 class="font-semibold text-lg text-gray-800 dark:text-white mb-4 border-b pb-2 dark:border-gray-700">Company Details</h3>
            <div class="mb-6">
                <x-input-label for="company_name" :value="__('Company Name')" />
                <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" required autofocus />
                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <x-input-label for="company_phone" :value="__('Company Phone Number')" />
                    <x-text-input id="company_phone" class="block mt-1 w-full" type="tel" name="company_phone" :value="old('company_phone')" />
                </div>
                <div>
                    <x-input-label for="company_email" :value="__('Company Email Address')" />
                    <x-text-input id="company_email" class="block mt-1 w-full" type="email" name="company_email" :value="old('company_email')" />
                </div>
                <div>
                    <x-input-label for="company_fax" :value="__('Company Fax Number')" />
                    <x-text-input id="company_fax" class="block mt-1 w-full" type="text" name="company_fax" :value="old('company_fax')" />
                </div>
                <div>
                    <x-input-label for="company_registration_number" :value="__('Company Registration Number')" />
                    <x-text-input id="company_registration_number" class="block mt-1 w-full" type="text" name="company_registration_number" :value="old('company_registration_number')" />
                </div>
                <div>
                    <x-input-label for="company_type" :value="__('Company Type')" />
                    <select id="company_type" name="company_type" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 rounded-md shadow-sm">
                        @php $companyTypes = ['Private Limited', 'Corporation', 'Company Limited', 'Enterprise', 'Sole Proprietorship']; @endphp
                        <option value="" @selected(old('company_type') == '')>Select a type</option>
                        @foreach ($companyTypes as $type)
                            <option value="{{ $type }}" @selected(old('company_type') == $type)>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-6">
                <x-input-label for="company_profile" :value="__('Company Profile')" />
                <textarea id="company_profile" name="company_profile" rows="4" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 rounded-md shadow-sm">{{ old('company_profile') }}</textarea>
            </div>

            <!-- Company Address -->
            <h3 class="font-semibold text-lg text-gray-800 dark:text-white mb-4 border-b pb-2 dark:border-gray-700">Company Address</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <x-input-label for="address_1" :value="__('Address 1')" />
                    <x-text-input id="address_1" class="block mt-1 w-full" type="text" name="address_1" :value="old('address_1')" required />
                </div>
                <div>
                    <x-input-label for="address_2" :value="__('Address 2 (Optional)')" />
                    <x-text-input id="address_2" class="block mt-1 w-full" type="text" name="address_2" :value="old('address_2')" />
                </div>
                <div>
                    <x-input-label for="address_3" :value="__('Address 3 (Optional)')" />
                    <x-text-input id="address_3" class="block mt-1 w-full" type="text" name="address_3" :value="old('address_3')" />
                </div>
                <div>
                    <x-input-label for="city" :value="__('City')" />
                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />
                </div>
                <div>
                    <x-input-label for="state" :value="__('State / Province')" />
                    <x-text-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required />
                </div>
                <div>
                    <x-input-label for="zip_code" :value="__('Zip / Postal Code')" />
                    <x-text-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" :value="old('zip_code')" required />
                </div>
                <div>
                    <x-input-label for="country" :value="__('Country')" />
                    <select id="country" name="country" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 rounded-md shadow-sm" required>
                        <option value="" disabled selected>Select a country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country }}" @selected(old('country') == $country)>{{ $country }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('country')" class="mt-2" />
                </div>
            </div>

            <!-- Director/Shareholder Information -->
            <div x-data="directorManager(@json(old('directors', [])))" class="mt-6 pt-6 border-t dark:border-gray-700">
                <h3 class="font-semibold text-lg text-gray-800 dark:text-white mb-2">Director and Shareholder Information</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Provide complete and accurate details of directors and shareholders.</p>

                <!-- Display Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                       <thead class="bg-gray-50 dark:bg-gray-800">
                           <tr>
                               <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Fullname</th>
                               <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                               <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">NRIC/Passport</th>
                               <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Shares (%)</th>
                               <th class="relative px-4 py-2"><span class="sr-only">Actions</span></th>
                           </tr>
                       </thead>
                       <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                           <template x-if="directors.length === 0">
                               <tr><td colspan="5" class="px-4 py-4 text-center text-gray-500">There are no directors and shareholders.</td></tr>
                           </template>
                           <template x-for="(director, index) in directors" :key="index">
                               <tr>
                                   <td class="px-4 py-3 whitespace-nowrap" x-text="director.fullname"></td>
                                   <td class="px-4 py-3 whitespace-nowrap" x-text="director.status"></td>
                                   <td class="px-4 py-3 whitespace-nowrap" x-text="director.nric_passport"></td>
                                   <td class="px-4 py-3 whitespace-nowrap" x-text="parseInt(director.ordinary_shares) + parseInt(director.preference_shares)"></td>
                                   <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                                       <button type="button" @click="openModalForEdit(index)" class="text-indigo-600 dark:text-indigo-400 hover:underline">Edit</button>
                                       <button type="button" @click="removeDirector(index)" class="text-red-600 dark:text-red-400 hover:underline ml-4">Delete</button>
                                   </td>
                               </tr>
                           </template>
                       </tbody>
                    </table>
                </div>

                <button type="button" @click="openModalForAdd()" class="mt-4 inline-flex items-center px-4 py-2 bg-green-600 text-white border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-green-500">Add Director and Shareholder</button>

                <!-- Hidden Inputs for Submission -->
                <template x-for="(director, index) in directors">
                    <div>
                        <input type="hidden" :name="'directors[' + index + '][fullname]'" :value="director.fullname">
                        <input type="hidden" :name="'directors[' + index + '][status]'" :value="director.status">
                        <input type="hidden" :name="'directors[' + index + '][nric_passport]'" :value="director.nric_passport">
                        <input type="hidden" :name="'directors[' + index + '][designation]'" :value="director.designation">
                        <input type="hidden" :name="'directors[' + index + '][email]'" :value="director.email">
                        <input type="hidden" :name="'directors[' + index + '][locality]'" :value="director.locality">
                        <input type="hidden" :name="'directors[' + index + '][ordinary_shares]'" :value="director.ordinary_shares">
                        <input type="hidden" :name="'directors[' + index + '][preference_shares]'" :value="director.preference_shares">
                    </div>
                </template>

                <!-- Modal -->
                <div x-show="isModalOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;">
                    <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                        <div x-show="isModalOpen" @click="isModalOpen = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
                        <div x-show="isModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block w-full max-w-3xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white dark:bg-gray-900 rounded-lg shadow-xl 2xl:max-w-4xl">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white" id="modal-title" x-text="editingDirectorIndex === null ? 'Add Director and Shareholder' : 'Edit Director and Shareholder'"></h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">'*' indicates required fields</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                                <div><x-input-label>Fullname *</x-input-label><x-text-input class="mt-1 w-full" x-model="newDirector.fullname" /></div>
                                <div><x-input-label>Status *</x-input-label>
                                    <select class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 rounded-md shadow-sm" x-model="newDirector.status">
                                        <option value="Bumiputera">Bumiputera</option><option value="Non-Bumiputera">Non-Bumiputera</option><option value="Foreign">Foreign</option>
                                    </select>
                                </div>
                                <div><x-input-label>NRIC / Passport No. *</x-input-label><x-text-input class="mt-1 w-full" x-model="newDirector.nric_passport" /></div>
                                <div><x-input-label>Position *</x-input-label><x-text-input class="mt-1 w-full" x-model="newDirector.designation" placeholder="Chairman"/></div>
                                <div><x-input-label>Email *</x-input-label><x-text-input class="mt-1 w-full" type="email" x-model="newDirector.email" /></div>
                                <div><x-input-label>Locality *</x-input-label><x-text-input class="mt-1 w-full" x-model="newDirector.locality" /></div>
                                <div><x-input-label>Ordinary Shares (%) *</x-input-label><x-text-input class="mt-1 w-full" type="number" x-model.number="newDirector.ordinary_shares" /></div>
                                <div><x-input-label>Preference Shares (%) *</x-input-label><x-text-input class="mt-1 w-full" type="number" x-model.number="newDirector.preference_shares" /></div>
                            </div>
                            <div class="mt-6 flex justify-end space-x-4">
                                <button @click="isModalOpen = false" type="button" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-200 dark:bg-gray-600 rounded-md hover:bg-gray-300">Cancel</button>
                                <button @click="saveDirector()" type="button" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                                    <span x-text="editingDirectorIndex === null ? 'Add Director and Shareholder' : 'Save Changes'"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Financial Performance -->
            <div class="mt-6 pt-6 border-t dark:border-gray-700">
                <h3 class="font-semibold text-lg text-gray-800 dark:text-white mb-2">Financial Performance</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Applicants are required to submit their company's financial information for the relevant years.</p>

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
                        <h4 class="font-semibold text-gray-800 dark:text-white h-10 flex items-center">Current Year *</h4>
                        <div>
                            <select name="current_financial_year" class="block w-full h-10 border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 rounded-md shadow-sm">
                                @php $currentYears = [2025, 2024, 2023]; @endphp
                                <option value="">Select Year</option>
                                @foreach($currentYears as $year)
                                <option value="{{ $year }}" @selected(old('current_financial_year', $user->vendorProfile?->current_financial_year) == $year)>{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        @php $currentFields = ['current_assets', 'current_non_current_assets', 'current_total_assets', 'current_current_liabilities', 'current_non_current_liabilities', 'current_total_liabilities', 'current_total_equity', 'current_retained_earnings', 'current_revenue', 'current_cost_of_sales', 'current_gross_profit_loss']; @endphp
                        @foreach($currentFields as $field)
                        <div class="relative"><span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">RM</span><x-text-input type="number" step="0.01" name="{{ $field }}" class="h-10 pl-10 w-full" :value="old($field, $user->vendorProfile?->{$field})" /></div>
                        @endforeach
                    </div>

                    <!-- Previous Year Column -->
                    <div class="md:col-span-1 space-y-4">
                        <h4 class="font-semibold text-gray-800 dark:text-white h-10 flex items-center">Previous Year *</h4>
                        <div>
                            <select name="previous_financial_year" class="block w-full h-10 border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 rounded-md shadow-sm">
                                @php $previousYears = [2024, 2023, 2022]; @endphp
                                <option value="">Select Year</option>
                                @foreach($previousYears as $year)
                                <option value="{{ $year }}" @selected(old('previous_financial_year', $user->vendorProfile?->previous_financial_year) == $year)>{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        @php $previousFields = ['previous_assets', 'previous_non_current_assets', 'previous_total_assets', 'previous_current_liabilities', 'previous_non_current_liabilities', 'previous_total_liabilities', 'previous_total_equity', 'previous_retained_earnings', 'previous_revenue', 'previous_cost_of_sales', 'previous_gross_profit_loss']; @endphp
                        @foreach($previousFields as $field)
                        <div class="relative"><span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">RM</span><x-text-input type="number" step="0.01" name="{{ $field }}" class="h-10 pl-10 w-full" :value="old($field, $user->vendorProfile?->{$field})" /></div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-primary-button>{{ __('Submit Application') }}</x-primary-button>
            </div>

            <script>
                function directorManager(initialDirectors) {
                    return {
                        directors: initialDirectors,
                        isModalOpen: false,
                        newDirector: { fullname: '', status: 'Bumiputera', nric_passport: '', designation: '', email: '', locality: '', ordinary_shares: 0, preference_shares: 0 },
                        editingDirectorIndex: null,
                        openModalForAdd() {
                            this.editingDirectorIndex = null;
                            this.newDirector = { fullname: '', status: 'Bumiputera', nric_passport: '', designation: '', email: '', locality: '', ordinary_shares: 0, preference_shares: 0 };
                            this.isModalOpen = true;
                        },
                        openModalForEdit(index) {
                            this.editingDirectorIndex = index;
                            this.newDirector = { ...this.directors[index] };
                            this.isModalOpen = true;
                        },
                        saveDirector() {
                            if (!this.newDirector.fullname || !this.newDirector.nric_passport) {
                                alert('Fullname and NRIC/Passport are required.');
                                return;
                            }
                            if (this.editingDirectorIndex !== null) {
                                this.directors[this.editingDirectorIndex] = this.newDirector;
                            } else {
                                this.directors.push(this.newDirector);
                            }
                            this.isModalOpen = false;
                        },
                        removeDirector(index) {
                            this.directors.splice(index, 1);
                        }
                    }
                }
            </script>
        </form>
    </div>
</x-app-layout>