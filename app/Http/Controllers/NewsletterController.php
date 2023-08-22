<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function index()
    {

        $page = Page::first();

        $subscribes = Subscribe::where('status', 'active')->get();
        $subscribeTotal = $subscribes->count();
        
        return view('public.home', [ 'subscribeTotal' => $subscribeTotal, 'page' => $page ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'max:255', 'unique:subscribe'],
        ],
        [
            'required'  => 'Campo obrigatório',
            'unique'    => 'Está sendo utilizado. Tente outro.'
        ]);

        try {
            $subscribe = new Subscribe();
            $subscribe->email = $request->email;
            $subscribe->created_at = now();
            $subscribe->save();

            if (!empty($request->origin)) {
            return redirect()->route('dashboard.subscribers')->with('success', 'Inscrito com sucesso');
            }

            return redirect()->route('newsletter.confirm');
        } catch (\Exception $e) {
           return redirect()->route('newsletter')->with('error', 'Erro ao se inscrever');
        }
    }

    public function confirm()
    {
        return view('public.confirm');
    }

    public function changeStatus($id)
    {
        if (!is_numeric($id)) {
            return redirect()->route('dashboard.subscribers')->with('warning', 'Precisa ser ID.');
        }
        
        try {
            $subscribe = Subscribe::where('id', $id)->first();

            $newStatus = $subscribe->status == 'active' ? 'disabled' : 'active';
            $subscribe->status =  $newStatus;
            $subscribe->updated_at = now();
            $subscribe->save();
        } catch(\Exception $e) {
            return redirect()->route('dashboard.subscribers')->with('error', 'Ocorreu um erro.');
        }

        return redirect()->route('dashboard.subscribers')->with('success', 'Alterado com sucesso.');
    }

    public function delete($id)
    {
        if (!is_numeric($id)) {
            return redirect()->route('dashboard.subscribers')->with('warning', 'Precisa ser ID.');
        }

        try {
            Subscribe::where('id', $id)->delete();
        } catch(\Exception $e) {
            return redirect()->route('dashboard.subscribers')->with('error', 'Ocorreu um erro.');
        }
        
        return redirect()->route('dashboard.subscribers')->with('success', 'Excluido com sucesso.');
    }
}
