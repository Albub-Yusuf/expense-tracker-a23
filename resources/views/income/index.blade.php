<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Income List') }}
        </h2>
</x-slot>



<div class="max-w-xl mx-auto p-4 sm:p-6 lg:p-8">
<div x-data="{ showMessage: true }" x-show="showMessage" class="flex justify-center">
    @if (session()->has('success'))
    <div class="flex items-center justify-between max-w-xl p-4 bg-white border rounded-md shadow-sm">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-500" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
            <p class="ml-3 text-sm font-bold text-green-600">{{ session()->get('success') }}</p>
        </div>
        <span @click="showMessage = false" class="inline-flex items-center cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </span>
    </div>
    @endif
</div>

<div x-data="{ showMessage: true }" x-show="showMessage" class="flex justify-center">
    @if (session()->has('updated'))
    <div class="flex items-center justify-between max-w-xl p-4 bg-white border rounded-md shadow-sm">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-500" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
            <p class="ml-3 text-sm font-bold text-green-600">{{ session()->get('updated') }}</p>
        </div>
        <span @click="showMessage = false" class="inline-flex items-center cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </span>
    </div>
    @endif
</div>


<div x-data="{ showMessage: true }" x-show="showMessage" class="flex justify-center">
    @if (session()->has('deleted'))
    <div class="flex items-center justify-between max-w-xl p-4 bg-white border rounded-md shadow-sm">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-red-500" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
            <p class="ml-3 text-sm font-bold text-red-600">{{ session()->get('deleted') }}</p>
        </div>
        <span @click="showMessage = false" class="inline-flex items-center cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </span>
    </div>
    @endif
</div>

<div x-data="{ showMessage: true }" x-show="showMessage" class="flex justify-center">
    @if (session()->has('failed'))
    <div class="flex items-center justify-between max-w-xl p-4 bg-white border rounded-md shadow-sm">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-500" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
            <p class="ml-3 text-sm font-bold text-red-600">{{ session()->get('failed') }}</p>
        </div>
        <span @click="showMessage = false" class="inline-flex items-center cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </span>
    </div>
    @endif
</div>

</div>



<div class="container mx-auto">

@include('myComponents.summary')

<div class="row">
<div class="col-md-10">
<div class="d-flex items-center justify-content-between">
<h2 class="my-4 text-right text-primary">Total Income = {{$totalIncome}} BDT</h2>
<a href="{{route('income.create')}}"><x-primary-button>Add Income</x-primary-button></a>
</div>
<table class="table" id="income_list">
  <thead>
    <tr>
      <th>Serial</th>
      <th>Income</th>
      <th>Amount</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach($incomes as $income)

   <tr>
      <td>{{$serial++}}</td>
      <td>{{$income->details}}</td>
      <td>{{$income->amount}}</td>
      <td>{{$income->date}}</td>
      <td>
        <div class="d-flex">
             
            <a href="{{route('income.edit',$income->id)}}">
             <x-secondary-button class="flex-inline">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                </svg>
            </x-secondary-button>
            </a>
            &nbsp;&nbsp;&nbsp;
         | &nbsp;&nbsp;&nbsp;
         <form action="{{route('income.destroy',$income->id)}}" method="post">
            @csrf
            @method('delete')
         <x-secondary-button type="submit"  onclick="return confirm('Are you sure to delete this record!');" value="X">
            X
        </x-secondary-button>
         </form>
        </div>
    
    </td>
    </tr>
    
   @endforeach
  </tbody>
  
</table>

</div>
</div>

</div>



</x-app-layout>

<script>
 $(function() {
   $('#income_list').DataTable();
 });
</script>