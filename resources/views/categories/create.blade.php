<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Category') }}
        </h2>
    </x-slot>

<div class="p-6 text-gray-900">

<div class="max-w-xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{route('category.store')}}">
            @csrf
            @method('POST')
            <input
                name="category"
                placeholder="{{ __('Enter Category Name...') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            value="{{ old('category') }}"></input>
            <input type="hidden" name="userId" value="{{Auth::user()->id}}">
            <x-input-error :messages="$errors->get('category')" class="mt-2" />
            <x-primary-button class="mt-4">Add Category</x-primary-button>
        </form>
    </div>

</div>        

</x-app-layout>