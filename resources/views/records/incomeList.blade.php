<div class="row">
<div class="col-md-10">
  <h1 class="text-center mt-4" style="font-size: 18px; font-weight:600;">Income Records</h1>
<div class="d-flex items-center justify-content-between">
<h2 class="my-4 text-right text-primary" style="font-size: 18px; font-weight:600;">Total Income = {{$recordsTotal}} BDT</h2>
</div>
<table class="table" id="income_list">
  <thead>
    <tr>
      <th>Serial</th>
      <th>Income</th>
      <th>Amount</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
   @foreach($recordsData as $income)

   <tr>
      <td>{{$serial++}}</td>
      <td>{{$income->details}}</td>
      <td>{{$income->amount}}</td>
      <td>{{$income->date}}</td>
    </tr>
    
   @endforeach
  </tbody>
  
</table>

</div>
</div>

<script>
 $(function() {
   $('#income_list').DataTable();
 });
</script>