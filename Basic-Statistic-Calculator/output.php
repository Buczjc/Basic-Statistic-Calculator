<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Output</title>
    <link rel="shortcut icon" href="images/Basic_Statistic_Calculator_Page_Logo.png" type="icon">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 90vh;
            flex-direction: column;
        }

        table {
        border-collapse: collapse;
        border: 1px solid black;
        }
        th, td {
        border: 1px solid black;
        padding: 6px;
        }

        a {
            margin-top: 40px;
        background-color: rgba(12,110,163,255);
        padding: 8px;
        text-decoration: none;
        color: white;
        border-radius: 16px;
        }
    </style>
</head>
<body>
<?php
session_start();
    //   FUNCTION FOR SUM
    function calculateSum($numbers) {
        $sum = 0; // Initialize sum variable

        // Loop through each number in the array and add it to the sum
        foreach ($numbers as $number) {
            // Convert the number to an integer and add it to the sum
            $sum += intval($number);
        }

        // Return the sum
        return $sum;
    }

    //    FUNCTION FOR MIN
    function calculateMin($numbers) {
        // Initialize min variable with max integer value
        $min = PHP_INT_MAX; 
        // Loop through each number in the array
        foreach ($numbers as $number) {
            // Update minimum if the current number is smaller
            if ($number < $min) {
                $min = $number;
            }
        }
        // Return the minimum
        return $min;
    }

    //FUNCTION FOR MAX
    function calculateMax($numbers) {
        // Initialize max variable with min integer value
        $max = PHP_INT_MIN;
        // Loop through each number in the array
        foreach ($numbers as $number) {
            // Update maximum if the current number is greater
            if ($number > $max) {
                $max = $number;
            }
        }
        // Return the maximum
        return $max;
    }

    //FUNCTION FOR RANGE
    function calculateRange($numbers) {
        // Calculate the minimum and maximum using existing functions
        $min = calculateMin($numbers);
        $max = calculateMax($numbers);

        // Calculate the range
        $range = $max - $min;

        // Return the range
        return $range;
    }

    //    FUNCTION FOR COUNT
    function calculateCount($numbers) {
        // Return the count of elements in the array
        return count($numbers);
    }

    //    FUNCTION FOR MEAN
    function calculateMean($numbers) {
        // Calculate the sum of the numbers using existing function
        $sum = calculateSum($numbers);
        // Calculate the mean by dividing the sum by the count of numbers
        $mean = $sum / count($numbers);
        // Return the mean
        return $mean;
    }

    //     FUNCTION FOR MEDIAN
    function calculateMedian($numbers) {
        // Sort the array in ascending order
        sort($numbers);
        // Calculate the index of the middle element
        $middleIndex = floor(count($numbers) / 2);
        // If the count of numbers is odd, return the middle element
        if (count($numbers) % 2 != 0) {
            return $numbers[$middleIndex];
        } else { // If the count of numbers is even, return the average of the two middle elements
            return ($numbers[$middleIndex - 1] + $numbers[$middleIndex]) / 2;
        }
    }

     //      FUNCTION FOR MODE
     function calculateMode($numbers) {
        // Count the frequency of each number
        $frequency = array_count_values($numbers);
        // Find the maximum frequency
        $maxFrequency = max($frequency);
        // If there is no mode (all frequencies are 1), return "N/A"
        if ($maxFrequency == 1) {
        return "N/A";
    }
    // Initialize an array to store the mode(s)
    $mode = array();
    // Loop through the frequency array to find the number(s) with maximum frequency
    foreach ($frequency as $num => $freq) {
        if ($freq == $maxFrequency) {
            $mode[] = $num;
        }
    }
    // Return the mode(s)
    return $mode;
}

//SORTED NUMBERS (USER INPUT)
    function sortNumbers($numbers) {
    // Convert the numbers to integers
    foreach ($numbers as &$number) {
        $number = intval($number);
    }

    // Sort the numbers in ascending order
    sort($numbers);

    // Return the sorted numbers
    return $numbers;
}

    // Check if data_set is submitted
    if(isset($_POST['data_set'])) {
        if (!isset($_SESSION['calc_count'])) {
            $_SESSION['calc_count'] = 0;
            $_SESSION['last_calc_time'] = time();
        }
        
        // SESSION FUNCTION TO LIMIT THE CALCULATION (2 TIMES)
        $timeSinceLastCalc = time() - $_SESSION['last_calc_time'];

        if ($_SESSION['calc_count'] >= 2 && $timeSinceLastCalc < 15) {
            echo '<script>alert("You have exceeded the calculation limit, please wait for 15 seconds.");window.location.href="calculate.php";</script>';
            exit; // Stop further execution
        } elseif ($timeSinceLastCalc >= 15) {
            // Reset the counter after 15 seconds
            $_SESSION['calc_count'] = 0;
        }

        $dataSet = $_POST['data_set'];
        $numbers = explode(' ', $dataSet);
        foreach ($numbers as $number) {
            if (!is_numeric($number) || $number <= 0) {
                echo '<script>alert("Please input valid numbers separated by spaces.");window.location.href="calculate.php";</script>';
                exit; // Stop further execution
            }
        }

        $_SESSION['calc_count']++;
        $_SESSION['last_calc_time'] = time();

        $sortedNumbers = sortNumbers($numbers);
        $sum = calculateSum($numbers);
        $min = calculateMin($numbers);
        $max = calculateMax($numbers);
        $range = calculateRange($numbers);
        $count = calculateCount($numbers);
        $mean = calculateMean($numbers);
        $median = calculateMedian($numbers);
        $mode = calculateMode($numbers);
    }
    ?>
    <div>
        <table border="1">
            <tr>
              <th>Input</th>
              <th>Minimum</th>
              <th>Maximum</th>
              <th>Range</th>
              <th>Count</th>
              <th>Sum</th>
              <th>Mean</th>
              <th>Median</th>
              <th>Mode</th>
            </tr>
            <tr>
              <td><?php foreach ($sortedNumbers as $number) {echo "$number ";} ?></td>
              <td><?php echo $min;?></td>
              <td><?php echo $max;?></td>
              <td><?php echo $range;?></td>
              <td><?php echo $count;?></td>
              <td><?php echo $sum;?></td>
              <td><?php echo $mean;?></td>
              <td><?php echo $median;?></td>
              <td><?php if ($mode === "N/A") {echo $mode;} else {foreach ($mode as $value) {echo "$value ";}}?></td>
            </tr>
            
          </table>
    </div>

    <a href="calculate.php">Calculate Again</a>
</body>
</html>

