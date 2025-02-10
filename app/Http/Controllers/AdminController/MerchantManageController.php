<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Merchant;
use Illuminate\Support\Facades\Log;

class MerchantManageController extends Controller
{
    public function index()
    {
        $merchants = Merchant::latest()
            ->paginate(6);

        Log::info('Merchant Data:', [
            'count' => $merchants->count(),
            'data' => $merchants->items()
        ]);

        return view('admin.dashboard.merchant-manage.index', [
            'mainTitle' => 'Merchant Management',
            'subTitle' => 'All Merchant',
            'title' => 'Merchant Management',
            'merchants' => $merchants
        ]);
    }

    public function create()
    {
        return view('admin.dashboard.merchant-manage.create', [
            'title' => 'Create Merchant'
        ]);
    }

    public function store(Request $request)
    {
        // Add validation and store logic here
    }

    public function edit($id)
    {
        $merchant = Merchant::findOrFail($id);
        return view('admin.dashboard.merchant-manage.edit', [
            'merchant' => $merchant,
            'title' => 'Edit Merchant'
        ]);
    }

    public function update(Request $request, $id)
    {
        // Add validation and update logic here
    }

    public function destroy($id)
    {
        $merchant = Merchant::findOrFail($id);
        $merchant->delete();
        return redirect()->route('admin.merchant.index')->with('success', 'Merchant deleted successfully');
    }

    public function all()
    {
        $merchants = Merchant::latest()
            ->paginate(6);

        Log::info('Merchant Data (All):', [
            'count' => $merchants->count(),
            'data' => $merchants->items()
        ]);

        return view('admin.dashboard.merchant-manage.index', [
            'mainTitle' => 'Merchant Management',
            'subTitle' => 'All Merchant',
            'title' => 'Merchant Management',
            'merchants' => $merchants
        ]);
    } 

    public function pending()
    {
        return view('admin.dashboard.merchant-manage.index', [
            'mainTitle' => 'Merchant Management',
            'subTitle' => 'Pending Verification',
            'title' => 'Merchant Management'  // untuk kompatibilitas
        ]);
    }

    public function verified()
    {
        return view('admin.dashboard.merchant-manage.index', [
            'mainTitle' => 'Merchant Management',
            'subTitle' => 'Verified',
            'title' => 'Merchant Management'  // untuk kompatibilitas
        ]);
    }

}