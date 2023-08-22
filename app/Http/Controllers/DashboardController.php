<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $activeCount = Subscribe::where('status', 'active')->count();
        $inactiveCount = Subscribe::where('status', 'disabled')->count();
        $subscribes = $this->getSubscribers();

        return view('dashboard.home', 
            [
                'activeCount' => $activeCount,
                'inactiveCount' => $inactiveCount,
                'subscribes' => $subscribes
            ]
        );
    }

    public function subscribers(Request $request)
    {
        $subscribes = new Subscribe();
        $all = $subscribes->where('email', 'LIKE', '%' . $request->search . '%')
        ->orderByDesc('id')
        ->paginate(9);
        
        return view('dashboard.subscribers', ['subscribes' => $all]);
    }

    private function getSubscribers()
    {
        return Subscribe::orderByDesc('id')->pluck('email')->implode(', ');
    }
}
