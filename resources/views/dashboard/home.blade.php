@extends('template-dashboard')

@section('content')
<h1 class="text-2xl font-semibold mb-5">Dashboard</h1>

<div class="grid md:grid-cols-4 sm:grid-cols-6 gap-4">
    <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ $activeCount }}
        </h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">
            Assinantes
            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                ativos
            </span>

        </p>
    </div>

    <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ $inactiveCount }}
        </h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">
            Assinantes 
            <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                desativados
            </span>
        </p>
    </div>
</div>

<div class="w-full mt-10">
    
    <label for="emailList" class="block mb-2 font-medium text-gray-900 dark:text-white">
        Inscritos 
        <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
            ativos
        </span>
    </label>
    
    <textarea 
    id="emailList"
    readonly
    rows="4"
    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
    >{{$subscribes}}</textarea>

    <button id="copyButton" class="mt-4 flex items-center justify-center text-white bg-primary hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" type="submit">
        Copiar e-mails
    </button>
</div>
@endsection
