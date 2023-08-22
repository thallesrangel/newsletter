@extends('template-dashboard')

@section('content')
<div class="relative p-4 w-full max-h-full">
    <div class="relative p-4 bg-white dark:bg-gray-800 sm:p-5">
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t sm:mb-5">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Página inicial</h3>
        </div>

        <form action="{{ route('page.save') }}" method="POST" autocomplete="off">
            @csrf
            <div class="grid gap-4 mb-4">

                <input 
                    type="text"
                    name="id"
                    value="{{ $pageConfiguration->id }}"
                    class="hidden"
                />

                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título</label>
                    <input 
                        type="text"
                        name="title"
                        value="{{ $pageConfiguration->title }}"
                        id="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Ex: Notícias de Finanças para quem não tem tempo de ler notícias."
                        required=""
                    >
                    {{ $errors->first('title') }}
                </div>
                <div>
                    <label for="subtitle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subtítulo</label>
                    <input 
                        type="text"
                        name="subtitle"
                        value="{{ $pageConfiguration->subtitle }}"
                        id="subtitle"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Ex: Junte-se à comunidade com"
                        required=""
                        >
                        {{ $errors->first('subtitle') }}
                </div>
            </div>

            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="placeholder_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Texto do campo e-mail</label>
                    <input 
                        type="text"
                        name="placeholder_email"
                        value="{{ $pageConfiguration->placeholder_email }}"
                        id="placeholder_email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Ex: Seu email principal"
                        required=""
                    >
                    {{ $errors->first('placeholder_email') }}
                </div>
                <div>
                    <label for="button_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do Botão</label>
                    <input 
                        type="text"
                        name="button_name"
                        value="{{ $pageConfiguration->button_name }}"
                        id="button_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Ex: Increver-se (Grátis)"
                        required=""
                    >
                    {{ $errors->first('button_name') }}
                </div>
            </div>

            <button type="submit" class="text-white inline-flex items-center bg-primary hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Salvar
            </button>
        </form>
    </div>
</div>

@endsection
