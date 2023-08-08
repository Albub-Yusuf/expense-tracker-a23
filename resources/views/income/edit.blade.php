<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Income') }}
        </h2>
    </x-slot>

<div class="p-6 text-gray-900">

<div class="max-w-xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{route('income.update',$incomeDetails->id)}}">
            @csrf
            @method('PUT')
            
            <input type="hidden" name="userId" value="{{Auth::user()->id}}">

            <input
                name="details"
                placeholder="{{ __('Enter Income Details') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ $incomeDetails->details }}"> </input>

            <x-input-error :messages="$errors->get('details')" class="mt-2" />

                <br>

            <input
                name="amount"
                placeholder="{{ __('Enter amount') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ $incomeDetails->amount }}"></input>

            <x-input-error :messages="$errors->get('amount')" class="mt-2" />

            <br>

            <input
                name="date",
                type="date"
                placeholder="{{ __('Enter Date') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
             value="{{ $incomeDetails->date }}"></input>

            <x-input-error :messages="$errors->get('date')" class="mt-2" />


            <x-primary-button class="mt-4">Add Income</x-primary-button>
        </form>
    </div>

</div>        

</x-app-layout>