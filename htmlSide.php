<!DOCTYPE html>
<html lang="en">
<head>
    <title>User register</title>
</head>
<style>
    body {
        background: url("https://www.burchcom.com/wp-content/uploads/2019/01/images1997-5c2f99436aa28-1024x683.jpg");
        background-size: cover;}
    table {
        background: url("https://previews.123rf.com/images/nyul/nyul1102/nyul110200262/8748110-portrait-of-happy-old-man-smiling-looking-at-camera-.jpg");
        width:100%
    }
</style>
<body>


<div style="text-align: center">
    <form action="index.php" method="POST">
        <label for="name"><b>Name:</b></label><br>
        <input type="text" id="name" name="name" placeholder="Enter a name..."><br><br>
        <label for="surname"><b>Surname:</b></label><br>
        <input type="text" id="surname" name="surname" placeholder="Enter a surname..."><br><br>
        <label for="personalCode"><b>Personal code:</b></label><br>
        <input type="text" id="personalCode" name="personalCode" placeholder="Enter the personal code..."><br><br>
        <label for="addInfo">Additional information:</label>
        <textarea id="addInfo" name="addInfo" rows="2" cols="30" placeholder="Enter additional information..."></textarea><br><br>

        <input type="submit" value="Add person!"><br><br>

    </form>
    <?php $data = fopen("personData.csv", "a+"); ?>

    <table>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Personal code</th>
            <th>Additional information</th>
        </tr>
        <tr>
            <td><?php fwrite($data, $_POST["name"]) . PHP_EOL ?></td>
            <td><?php fwrite($data, $_POST["surname"]) . PHP_EOL ?></td>
            <td><?php fwrite($data, $_POST["personalCode"]) . PHP_EOL ?></td>
            <td><?php fwrite($data, $_POST["addInfo"]) . PHP_EOL ?></td>
        </tr>

    </table>
 <?php   fclose($data); ?>

</div>
</body>
</html>