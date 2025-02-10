<?php
namespace App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PelacakanController extends Controller
{
    public function showOrder($id)
    {
        $order = Order::with('items')->find($id);
        
        if (!$order) {
            abort(404, 'Order tidak ditemukan');
        }
    
        return view('user.pelacakan.index', compact('order'));
    }
}

