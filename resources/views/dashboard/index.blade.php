@extends('dashboardLayout')

@section('title')
    Dashboard
@endsection

@section('content')
    <h1>Welcome, {{ Auth::user()->first_name }}!</h1>



    <h2>Meter Reading</h2>
    <table border=1 class="table table-hover">
        <thead>
        <tr>
            <th>Unit</th>
            <th>Time and date</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $user = Auth::user();
            $readings = $user->showReadings($user);
            //echo $readings;
            if($readings){
                foreach($readings as $reading){
                    echo "<tr>";
                    echo "<td>".$reading->unit."</td>";
                    echo "<td>".$reading->created_at."</td>";
                    echo "</tr>";
                }
            }

        ?>
        </tbody>
    </table>

    <br>
    <br>
    <h2>Billing records</h2>
    <table border=1 class="table table-hover">
        <thead>
        <tr>
            <th>Bill #</th>
            <th>Month</th>
            <th>Total Unit</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Comment</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //$user = Auth::user();
        $user = Auth::user();

        $bills = $user->showBills($user);

        //echo $readings;
        if($bills){
            foreach($bills as $bill){
                echo "<tr>";
                echo "<td>".$bill->id."</td>";
                echo "<td>".$bill->month."</td>";
                echo "<td>".$bill->total_unit."</td>";
                echo "<td>".$bill->amount."</td>";
                echo "<td>".$bill->status."</td>";
                echo "<td><a class='btn btn-success' href='/comment/".$bill->id."'>Comment</a></td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>

    <a href="/genBill" class="btn btn-success">Generate Bills</a>



@endsection