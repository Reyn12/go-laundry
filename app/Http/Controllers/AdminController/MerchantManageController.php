<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Merchant;

class MerchantManageController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.merchant-manage.index', [
            'mainTitle' => 'Merchant Management',
            'subTitle' => 'All Merchant',
            'title' => 'Merchant Management'  // untuk kompatibilitas
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
        return view('admin.dashboard.merchant-manage.index', [
            'mainTitle' => 'Merchant Management',
            'subTitle' => 'All Merchant',
            'title' => 'Merchant Management'  // untuk kompatibilitas
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