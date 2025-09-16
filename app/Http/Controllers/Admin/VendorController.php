<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Countries;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\VendorStatusChanged;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = User::where('role', 'vendor')
                        ->with('vendorProfile')
                        ->get();

        return view('admin.vendors.index', compact('vendors'));
    }

    public function show(User $user)
    {
        $user->load('vendorProfile.directorShareholders');
        $countries = Countries::all();
        return view('admin.vendors.show', compact('user', 'countries'));
    }

    public function approve(User $user)
    {
        $user->update(['status' => 'approved']);
        Notification::send($user, new VendorStatusChanged($user));
        return redirect()->route('admin.vendors.show', $user)->with('success', 'Vendor approved successfully.');
    }

    public function reject(User $user)
    {
        $user->update(['status' => 'rejected']);
        Notification::send($user, new VendorStatusChanged($user));
        return redirect()->route('admin.vendors.show', $user)->with('success', 'Vendor rejected successfully.');
    }

    public function edit(User $user)
    {
        // This line is correct and will work once the syntax error is fixed.
        $user->load('vendorProfile.directorShareholders');
        $countries = Countries::all();
        // ADD THIS DEBUGGING LINE
        

        return view('admin.vendors.edit', compact('user', 'countries'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'company_phone' => ['nullable', 'string', 'max:255'],
            'company_email' => ['nullable', 'email', 'max:255'],
            'company_fax' => ['nullable', 'string', 'max:255'],
            'company_registration_number' => ['nullable', 'string', 'max:255'],
            'company_type' => ['nullable', 'string', 'max:255'],
            'company_profile' => ['required', 'string'],
            'address_1' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:20'],
            'country' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'directors' => ['nullable', 'array'],
            'directors.*.fullname' => ['required_with:directors', 'string', 'max:255'],
            'directors.*.status' => ['required_with:directors', 'string'],
            'directors.*.nric_passport' => ['required_with:directors', 'string', 'max:255'],
            'directors.*.designation' => ['required_with:directors', 'string', 'max:255'],
            'directors.*.email' => ['required_with:directors', 'email', 'max:255'],
            'directors.*.locality' => ['required_with:directors', 'string', 'max:255'],
            'directors.*.ordinary_shares' => ['required_with:directors', 'integer', 'min:0'],
            'directors.*.preference_shares' => ['required_with:directors', 'integer', 'min:0'],
            'current_financial_year' => ['nullable', 'integer'],
            'current_assets' => ['nullable', 'numeric', 'min:0'],
            'current_non_current_assets' => ['nullable', 'numeric', 'min:0'],
            'previous_financial_year' => ['nullable', 'integer'],
            'previous_assets' => ['nullable', 'numeric', 'min:0'],
            'previous_non_current_assets' => ['nullable', 'numeric', 'min:0'],
        ]);

        // Update User and VendorProfile
        $user->update($request->only('name', 'email'));
        if ($user->vendorProfile) {
            $user->vendorProfile->update($request->except(['_token', '_method', 'name', 'email', 'directors']));
        }

        // Sync director/shareholder info
        if ($user->vendorProfile) {
            $user->vendorProfile->directorShareholders()->delete(); // Delete old entries
            if ($request->has('directors')) {
                foreach ($request->directors as $directorData) {
                    $user->vendorProfile->directorShareholders()->create($directorData); // Create new ones
                }
            }
        }

        return redirect()->route('admin.vendors.show', $user)->with('success', 'Vendor profile updated successfully.');
    }
}