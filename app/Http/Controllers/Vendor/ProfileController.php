<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorProfile;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Countries;

class ProfileController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user(); // Get the currently authenticated user
        $countries = Countries::all();
        // Pass both the user and countries to the view
        return view('vendor.profile.create', compact('user', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'company_profile' => ['required', 'string'],
            'address_1' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:20'],
            'country' => ['required', 'string', 'max:255'],
            'company_phone' => ['nullable', 'string', 'max:255'],
            'company_email' => ['nullable', 'email', 'max:255'],
            'company_fax' => ['nullable', 'string', 'max:255'],
            'company_registration_number' => ['nullable', 'string', 'max:255'],
            'company_type' => ['nullable', 'string', 'max:255'],
            'directors' => ['nullable', 'array'],
            'directors.*.fullname' => ['required_with:directors', 'string', 'max:255'],
            'directors.*.status' => ['required_with:directors', 'string'],
            'directors.*.nric_passport' => ['required_with:directors', 'string', 'max:255'],
            'directors.*.designation' => ['required_with:directors', 'string', 'max:255'],
            'directors.*.email' => ['required_with:directors', 'email', 'max:255'],
            'directors.*.locality' => ['required_with:directors', 'string', 'max:255'],
            'directors.*.ordinary_shares' => ['required_with:directors', 'integer', 'min:0'],
            'directors.*.preference_shares' => ['required_with:directors', 'integer', 'min:0'],
            
            // Current Year
            'current_financial_year' => ['nullable', 'integer'],
            'current_assets' => ['nullable', 'numeric', 'min:0'],
            'current_non_current_assets' => ['nullable', 'numeric', 'min:0'],
            'current_total_assets' => ['nullable', 'numeric', 'min:0'],
            'current_current_liabilities' => ['nullable', 'numeric', 'min:0'],
            'current_non_current_liabilities' => ['nullable', 'numeric', 'min:0'],
            'current_total_liabilities' => ['nullable', 'numeric', 'min:0'],
            'current_total_equity' => ['nullable', 'numeric', 'min:0'],
            'current_retained_earnings' => ['nullable', 'numeric', 'min:0'],
            'current_revenue' => ['nullable', 'numeric', 'min:0'],
            'current_cost_of_sales' => ['nullable', 'numeric', 'min:0'],
            'current_gross_profit_loss' => ['nullable', 'numeric', 'min:0'],

            // Previous Year
            'previous_financial_year' => ['nullable', 'integer'],
            'previous_assets' => ['nullable', 'numeric', 'min:0'],
            'previous_non_current_assets' => ['nullable', 'numeric', 'min:0'],
            'previous_total_assets' => ['nullable', 'numeric', 'min:0'],
            'previous_current_liabilities' => ['nullable', 'numeric', 'min:0'],
            'previous_non_current_liabilities' => ['nullable', 'numeric', 'min:0'],
            'previous_total_liabilities' => ['nullable', 'numeric', 'min:0'],
            'previous_total_equity' => ['nullable', 'numeric', 'min:0'],
            'previous_retained_earnings' => ['nullable', 'numeric', 'min:0'],
            'previous_revenue' => ['nullable', 'numeric', 'min:0'],
            'previous_cost_of_sales' => ['nullable', 'numeric', 'min:0'],
            'previous_gross_profit_loss' => ['nullable', 'numeric', 'min:0'],
        ]);

        // Create the VendorProfile and assign it to a variable
        $vendorProfile = VendorProfile::create([
            'user_id' => Auth::id(),
            'company_name' => $request->company_name,
            'company_profile' => $request->company_profile,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'address_3' => $request->address_3,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
            'company_phone' => $request->company_phone,
            'company_email' => $request->company_email,
            'company_fax' => $request->company_fax,
            'company_registration_number' => $request->company_registration_number,
            'company_type' => $request->company_type,
        ]);

        // Use the new $vendorProfile variable to create the directors
        if ($request->has('directors')) {
            foreach ($request->directors as $directorData) {
                $vendorProfile->directorShareholders()->create($directorData);
            }
        }

        // Set the user's status to 'pending'
        Auth::user()->update(['status' => 'pending']);

        return redirect()->route('dashboard')->with('success', 'Profile submitted! Please wait for admin approval.');
    }
}