<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistic Calculator</title>
    <link rel="shortcut icon" href="images/Basic_Statistic_Calculator_Page_Logo.png" type="icon">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:cursive
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    border: 1px black solid;
    width: 400px;
    height: 400px;
    border-bottom-right-radius: 8px;
}

.logo {
    position: relative;
    bottom: 70px;
    
}

.form {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    bottom: 30px;
}

.input-text {
    height: 50px;
    padding-left: 15px;
    padding-right: 15px;
    position: relative;
    bottom: 10px;
}

.btn-func input[type="submit"] {
    margin-right: 10px;
}

.btn-func input[type="reset"] {
    margin-left: 10px;
}

.btn-func input[type="reset"], input[type="submit"] {
    width: 100px;
    position: relative;
    top: 30px;
} 

.btn-func {
    display: flex;
    justify-content: center;
}

.container p {
    position: relative;
    top: 60px;
    font-size: medium;
}

.Enter-field {
    display: flex;
    justify-content: center;
}
    </style>
</head>
<body>

    <div class="container">
        <h2 class="logo">Basic Statistic Calculator</h2>

        <div class="form">
            <form action="output.php" method="post">
            <label for="form-element" class="Enter-field">Enter a Data Set</label><br>
            <input type="text" name="data_set" id="form-element" class="input-text" required>

            <div class="btn-func">
                <input type="submit" value="submit" name="submit">
                <input type="reset" value="clear">
            </div>

            </form>
        </div>

        <p>&#9755; NOTE: Enter data separated by spaces.</p>

    </div>

    
</body>
</html>