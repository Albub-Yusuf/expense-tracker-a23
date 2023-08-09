<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Records') }}
        </h2>
    </x-slot>

<div class="p-6 text-gray-900">

<br>
<div class="max-w-xl mx-auto p-4 sm:p-6 lg:p-8">

<form method="POST" action="{{route('records.calculate')}}">
            @csrf
            @method('POST')

            

            <input type="hidden" name="userId" value="{{Auth::user()->id}}"/>

            <br>

           <div class="mt-2">
                 <label for="startingDate">Select Starting Date: </label> <br>

                <br>

                 <input name="startingDate" id="startingDate" type="date" placeholder="{{ __('Enter Starting Date') }}" 
                     class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                         value="{{ old('startingDate') }}"></input>

                <x-input-error :messages="$errors->get('startingDate')" class="mt-2" />
           </div>

           <div class="mt-2">
                 <label for="enDate">Select End Date: </label> <br>

                <br>

                 <input name="endDate" id="endDate" type="date" placeholder="{{ __('Enter End Date') }}" 
                     class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                         value="{{ old('endDate') }}"></input>

                <x-input-error :messages="$errors->get('endDate')" class="mt-2" />
           </div>

           <div class="mt-2">

           <label for="category">Select Options: </label>

                <select name="option" id="option" class="mt-2">

                 <option value="1">Income</option>
                 <option value="2">Expense</option>
                 <option value="3">Both Income & Expense</option>
               
 
                    

                </select>

           </div>

        
            <x-primary-button class="mt-4">Show Result</x-primary-button>
        </form>
   
</div>

</div>   

<br>

<div class="container mx-auto">
    <div class="row mx-auto">
        <div class="col-md-10 mx-auto" >
            <hr style="width: 50%; margin:0 auto;">

                @if($showTable==1)
                     @include('records.incomeList')
                @endif

                @if($showTable==2)
                     @include('records.expenseList')
                @endif

                @if($showTable==3)
                     @include('records.balanceList')
                @endif
        </div>
    </div>
</div>

</x-app-layout>