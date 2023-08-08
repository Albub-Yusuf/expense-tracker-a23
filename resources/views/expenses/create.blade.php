<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Expense') }}
        </h2>
    </x-slot>

<div class="p-6 text-gray-900">

<div class="max-w-xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{route('expense.store')}}">
            @csrf
            @method('POST')
            
            <input type="hidden" name="userId" value="{{Auth::user()->id}}">

            <input
                name="details"
                placeholder="{{ __('Enter Expense Details') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('details') }}"> </input>

            <x-input-error :messages="$errors->get('details')" class="mt-2" />

                <br>

            <input
                name="amount"
                placeholder="{{ __('Enter amount') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('amount') }}"></input>

            <x-input-error :messages="$errors->get('amount')" class="mt-2" />

            <br>

            <input
                name="date",
                type="date"
                placeholder="{{ __('Enter Date') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
             value="{{ old('date') }}"></input>

            <x-input-error :messages="$errors->get('date')" class="mt-2" />

           <div class="mt-2">

           <label for="category">Select Category: </label>

                <select name="category" id="category" class="mt-2">

                @foreach($categories as $category)
                 <option value="{{$category->id}}">{{$category->category}}</option>
                @endforeach
 
                    

                </select>

           </div>

        
            <x-primary-button class="mt-4">Add Expense</x-primary-button>
        </form>
    </div>

</div>        

</x-app-layout>