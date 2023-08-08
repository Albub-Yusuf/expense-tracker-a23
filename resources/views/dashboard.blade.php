<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-md-12">
        
        <div class="col-md-4">
        <div class="py-10">
       
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="my-4 text-center text-primary" style="font-size:24px;">Total Income = {{$totalIncome}} BDT</h2>
                </div>
            </div>
       
        </div>
        </div>

       <div class="col-md-4">
       <div class="py-10">
        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="my-4 text-center text-primary" style="font-size:24px;">Total Expense = {{$totalExpense}} BDT</h2>
                </div>
            
        </div>
        </div>
       </div>

       
       <div class="col-md-4">
       <div class="py-10">
        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="my-4 text-center text-primary" style="font-size:24px;">Balance = {{$balanced}} BDT</h2>
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
