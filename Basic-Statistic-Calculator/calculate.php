<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistic Calculator</title>
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

.submit-func {
    width: 90px;
    color: blueviolet;
}

.btn-func input {
    width: 100px;
    margin: 5px;
    position: relative;
    bottom: 5px;
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
            <form action="calculate.php" method="post">
            <label for="form-element" class="Enter-field">Enter a Data Set</label><br>
            <input type="text" name="" id="form-element" class="input-text">
            </form>
        </div>

        

        <div class="btn-func">
            <input type="submit" value="Submit">
            <input type="submit" value="Clear">
        </div>

        <p>&#9755; NOTE: Enter data separated by spaces.</p>

    </div>

    
</body>
</html>