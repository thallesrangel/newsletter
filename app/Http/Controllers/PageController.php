<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pageConfiguration = Page::first();

        return view('dashboard.page', [ 'pageConfiguration' => $pageConfiguration ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string', 'max:255'],
            'placeholder_email' => ['required', 'string', 'max:255'],
            'button_name' => ['required', 'string', 'max:255'],
        ],
        [
            'required'  => 'Campo obrigatório'
        ]);

        try {
            $page = Page::where('id', $request->id)->firstOrFail();
            $page->title = $request->title;
            $page->subtitle = $request->subtitle;
            $page->placeholder_email = $request->placeholder_email;
            $page->button_name = $request->button_name;
            $page->updated_at = now();
            $page->save();

            return redirect()->route('page')->with('success', 'Atualizado com sucesso');
        } catch (\Exception $e) {
            var_dump($e->getMessage());
           return redirect()->route('page')->with('error', 'Erro ao atualizar');
        }
    }
}
