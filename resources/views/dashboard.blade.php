<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-md-12">
        
        <div class="col-md-12">
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

       
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                     <h2 class="my-2 text-center text-danger" style="font-size:24px;">Total Summary</h2>

                    <h2 class="my-2 text-right text-success" style="font-size:18px;">Total Income = {{$totalIncome}} BDT</h2>
                    <h2 class="my-2 text-right text-danger" style="font-size:18px;">Total Expense = {{$totalExpense}} BDT</h2>
                    <hr style="width: 50%; float:right;"><br>
                    <h2 class="my-2 text-right text-primary" style="font-size:18px;">Net Income= {{$balanced}} BDT</h2>


                </div>
            </div>

        </div>
       
        </div>
        </div>

       
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
