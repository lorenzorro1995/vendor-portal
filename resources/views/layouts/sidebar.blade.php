<aside class="flex flex-col w-64 h-screen px-5 py-8 overflow-y-auto bg-[#434343] border-r rtl:border-r-0 rtl:border-l border-gray-700">
    <a href="{{ route('dashboard') }}" class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h6M9 11.25h6m-6 4.5h6M5.25 6h.008v.008H5.25V6zm.75 4.5h.008v.008H6v-.008zm-.75 4.5h.008v.008H5.25v-.008zm13.5-9h.008v.008h-.008V6zm-.75 4.5h.008v.008h-.008v-.008zm.75 4.5h.008v.008h-.008v-.008z" />
        </svg>
        <h1 class="ml-2 text-xl font-bold text-white">Vendor Portal</h1>
    </a>

    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav class="-mx-3 space-y-6 ">
            <div class="space-y-3 ">
                @if(Auth::user()->role === 'vendor')
                    <label class="px-3 text-xs text-gray-400 uppercase">
                        {{ Auth::user()->vendorProfile->company_name ?? 'Vendor Menu' }}
                    </label>

                    <a class="flex items-center px-3 py-2 text-white transition-colors duration-300 transform rounded-lg hover:bg-[#b42025] hover:text-white {{ request()->routeIs('dashboard') ? 'bg-[#b42025]' : '' }}" href="{{ route('dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" /></svg>
                        <span class="mx-2 text-sm font-medium">Dashboard</span>
                    </a>

                    <a class="flex items-center px-3 py-2 text-white transition-colors duration-300 transform rounded-lg hover:bg-[#b42025] hover:text-white" href="#">
                       <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" /></svg>
                        <span class="mx-2 text-sm font-medium">Registration Details</span>
                    </a>
                     <!-- Add other vendor links here -->
                @endif

                @if(Auth::user()->role === 'admin')
                     <label class="px-3 text-xs text-gray-400 uppercase">Admin Menu</label>
                     <a class="flex items-center px-3 py-2 text-white transition-colors duration-300 transform rounded-lg hover:bg-[#b42025] hover:text-white {{ request()->routeIs('admin.vendors.index') || request()->routeIs('admin.vendors.show') || request()->routeIs('admin.vendors.edit') ? 'bg-[#b42025]' : '' }}" href="{{ route('admin.vendors.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" /></svg>
                        <span class="mx-2 text-sm font-medium">Manage Vendors</span>
                    </a>
                @endif
            </div>

            <div class="space-y-3 ">
                <label class="px-3 text-xs text-gray-400 uppercase">Customization</label>
                <a class="flex items-center px-3 py-2 text-white transition-colors duration-300 transform rounded-lg hover:bg-[#b42025] hover:text-white {{ request()->routeIs('profile.edit') ? 'bg-[#b42025]' : '' }}" href="{{ route('profile.edit') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01-.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" /></svg>
                    <span class="mx-2 text-sm font-medium">Account Settings</span>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="flex items-center px-3 py-2 text-white transition-colors duration-300 transform rounded-lg hover:bg-[#b42025] hover:text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                       <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" /></svg>
                        <span class="mx-2 text-sm font-medium">Logout</span>
                    </a>
                </form>
            </div>
        </nav>
    </div>
</aside>