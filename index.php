<?php
include 'calculation.php'
?>

<html>
<body>

    <title>Calculate Home Electricity</title>
    <h1>Calculate Home Electricity Bill</h1>

    <?php
        if($error != ""){
            echo "<p>Warning:</b> " . $error . "</p>";
        }
    ?>

    <table border="1">
        <tr>
            <th>Block Tariff (per month)</th>
            <th>Unit</th>
            <th>Rate</th>
        </tr>
        <tr>
            <td>For the first 200 kWh (1-200 kWh) per month</td>
            <td>1-200/kWh</td>
            <td>0.218</td>
        </tr>
        <tr>
            <td>For the next 100 kWh (201-300 kWh) per month</td>
            <td>201-300/kWh</td>
            <td>0.344</td>
        </tr>
        <tr>
            <td>For the next 300 kWh (301-600 kWh) per month</td>
            <td>301-600/kWh</td>
            <td>0.516</td>
        </tr>
        <tr>
            <td>For the next 300 kWh (601-900 kWh) per month</td>
            <td>601-900/kWh</td>
            <td>0.546</td>
        </tr>
        <tr>
            <td>For the next kWh (901 kWh onwards) per month</td>
            <td>901/kWh onwards</td>
            <td>0.571</td>
        </tr>
    </table>

    <br><br>

    <form method="POST">
        <label>Enter your first 200 kWh (1-200 kWh) per month:</label>
        <input type="text" name="units" value=""><br><br>

        <label>Enter your next 100 kWh (201-300 kWh) per month:</label>
        <input type="text" name="units2" value=""><br><br>

        <label>Enter your next 300 kWh (301-600 kWh) per month:</label>
        <input type="text" name="units3" value=""><br><br>

        <label>Enter your next 300 kWh (601-900 kWh) per month:</label>
        <input type="text" name="units4" value=""><br><br>

        <label>Enter your next kWh (901 kWh onwards) per month:</label>
        <input type="text" name="units5" value=""><br><br>

        <button type="submit" name="calculate" value="">Calculate Bill</button>
        <button type="reset" name="reset" value="">Reset</button>
    </form>
</body>

<h1>Calculated Bill</h1>

<?php
if($showBill){
    echo "1-200 kWh: " . $units . " kWh x 0.218 = RM " . number_format($charge1, 2) . "<br>";
    echo "201-300 kWh: " . $units2 . " kWh x 0.344 = RM " . number_format($charge2, 2) . "<br>";
    echo "301-600 kWh: " . $units3 . " kWh x 0.516 = RM " . number_format($charge3, 2) . "<br>";
    echo "601-900 kWh: " . $units4 . " kWh x 0.546 = RM " . number_format($charge4, 2) . "<br>";
    echo "901 kWh onwards: " . $units5 . " kWh x 0.571 = RM " . number_format($charge5, 2) . "<br>" . "<br>"; 

    echo "Total Energy Consumption: " . number_format($totalkWh, 2) . "<br>";
    echo "Total Energy Rate: " . number_format($totalCharge, 2) . "<br>";
    echo "6% SST: " . number_format($sst, 2) . "<br>";
    echo "Total Energy Bill: " . number_format($totalBill, 2) . "<br>";
}

?>

</html>

