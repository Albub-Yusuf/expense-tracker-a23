<div class="row">
<div class="col-md-10">
  <h1 class="text-center mt-4" style="font-size: 18px; font-weight:600;">Expense Records</h1>
<div class="d-flex items-center justify-content-between">
<h2 class="my-4 text-right text-primary" style="font-size: 18px; font-weight:600;">Total Expense = {{$recordsTotal}} BDT</h2>
</div>
<table class="table" id="expense_list">
  <thead>
    <tr>
      <th>Serial</th>
      <th>Expense</th>
      <th>Amount</th>
      <th>Category</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
   @foreach($recordsData as $expense)

   <tr>
      <td>{{$serial++}}</td>
      <td>{{$expense->details}}</td>
      <td>{{$expense->amount}}</td>
      <td>{{$expense->category->category}}</td>
      <td>{{$expense->date}}</td>
    </tr>
    
   @endforeach
  </tbody>
  
</table>

</div>
</div>

<script>
 $(function() {
   $('#expense_list').DataTable();
 });
</script>