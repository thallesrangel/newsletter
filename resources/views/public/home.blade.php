@extends('template-default')

@section('content')


  <div class="flex justify-center items-center h-screen">
    <div class="w-full lg:w-1/2 xl:w-1/3">

      @if($errors->has('email'))
        <div class="top-2 right-5 fixed transition transform duration-300 ease-in-out hover:scale-105">
          <div id="toast-warning" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                </svg>
                <span class="sr-only">Aviso</span>
            </div>
            <div class="ml-3 text-sm font-normal">{{ $errors->first('email') }}</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
                <span class="sr-only">Close</span>
                <i class="w-5 h-5" data-feather="x"></i>
            </button>
          </div>
        </div>
      @endif

      <div class="flex justify-center">
        <img class="rounded-full w-20	h-20 object-cover" src="{{asset('profile.jpg')}}" alt="Perfil">
      </div>
      
      <h1 class="text-3xl font-bold text-center mt-5 mb-5">
        {{ $page->title }}
      </h1>
      <p class="text-center mt-2 mb-2">
        {{ $page->subtitle }}
      </p>
      
      <p class="text-center mt-1 mb-1">
        <span class="font-bold">{{ $subscribeTotal }} leitores ativos</span>
      </p>
      
      <form action="{{ route('newsletter.store') }}" method="POST" autocomplete="off">
        @csrf
        <div class="flex items-center justify-center mt-5">
          <div class="relative">
            <input
              type="email"
              name="email"
              class="w-72 pl-10 pr-4 py-2 border rounded focus:outline-none focus:border-blue-300"
              placeholder="{{ $page->placeholder_email }}"
              required
            />
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 h-full">
              <i class="text-gray-400 w-4	" data-feather="mail"></i>
            </div>
          </div>
        </div>
      
        <div class="flex justify-center mt-5">
          <button
            type="submit" 
            class="bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded w-72"
            >
            {{ $page->button_name }}
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection