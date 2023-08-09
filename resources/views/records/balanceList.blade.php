<div class="container mt-5">
    <h1 class="text-center my-4" style="font-size: 18px; font-weight:600;">Income & Expense Balance Sheet</h1>
    <table class="table table-bordered">
        <tbody style="font-size: 18px; font-weight:600;">
            <tr>
                <th>Category</th>
                <th>Amount</th>
            </tr>
            <tr class="text-success" style="font-size: 18px; font-weight:600;">
                <td>Income</td>
                <td>{{$recordsTotalIncome}} BDT</td>
            </tr>
            <tr class="text-danger">
                <td>Expense</td>
                <td>{{$recordsTotalExpense}} BDT</td>
            </tr>
            <tr>
                <td>Balance</td>
                <td>{{$recordsTotalIncome - $recordsTotalExpense}} BDT</td>
            </tr>
        </tbody>
    </table>
</div>