<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" type="text/css" href="./css/dropdown.css">
    <title>Launch Time </title>
</head>
<body>

<?php

if (isset($_POST['users'])) {
    require('connect.php');
    $username = $_POST['users'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    $query = "SELECT * FROM `time_calculation` WHERE id='$username' AND MONTH(`date`)='$month'
   AND YEAR(`date`)='$year' ORDER BY date ASC";

    $result = mysql_query($query) or die(mysql_error());
    $count = mysql_num_rows($result);
    if ($count <= 0) {
        echo "No entry found";
    }
    else {
        ?>
        <div class="wrapper-date"> <span class="user-span">
        <?php
        while ($row = mysql_fetch_array($result)) {
            $diff = round(abs(strtotime($row['launch_start']) - strtotime($row['launch_end'])));
            if ($diff >= 86400) {
                echo "<p class='user-date'>" . " Lunch Duration Invalid </p>";
            } // more than 24 hour
            elseif ($diff >= 3600) {
                $hour = round($diff / 3600);
                $minute = (($diff / 60) % 60);
                echo "<p class='user-date'>" . $row['date'] . " Lunch Duration " . $hour . " Hour " . $minute . " Minute </p>";

            } else {
                $min = $diff / 60;
                echo "<p class='user-date'>" . $row['date'] . " Lunch Duration " . round($min) . " Minute </p>";
            }
            echo "";

        }
        ?>
            </span>
        </div>

    <?php
    }
}
else {
    require('user_lunch.php');
    ?>

<div style="text-align: center; width: 500px; margin: 0 auto;">
    <h1>Launch Time Search </h1>
	</div>
    </input>

    <form method="post" action="">
        <p class="name-user">Select Name</p><br/><br/>
        <select name="users" class="user-info">
            <?php user_name(); ?>
        </select>

        <div>
                <fieldset class="my-calendar">
                    <legend>Select date</legend>
                    <div class="jcalendar-wrapper">
                        <div class="jcalendar-selects">
                            <select name="month" id="month" class="jcalendar-select-month">
                                <option value="0">Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <select name="year" id="year" class="jcalendar-select-year">
                                <option value="0">Year</option>
                                <option value="1982">1982</option>
                                <option value="1983">1983</option>
                                <option value="1984">1984</option>
                                <option value="1985">1985</option>
                                <option value="1986">1986</option>
                                <option value="1987">1987</option>
                                <option value="1988">1988</option>
                                <option value="1989">1989</option>
                                <option value="1990">1990</option>
                                <option value="1991">1991</option>
                                <option value="1992">1992</option>
                                <option value="1993">1993</option>
                                <option value="1994">1994</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                                <option value="1998">1998</option>
                                <option value="1999">1999</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                                <option value="2031">2031</option>
                                <option value="2032">2032</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
        </div>

        <p class="submit-user">
            <button id="submit" type="submit">Submit</button>
        </p>
    </form>
    <br>

</div>
<?php } ?>

 <div id = "return">
     <a class="btn" href="launch.php"> Back </a>
     <a class="btn" href="logout.php"> Logout </a>

</body>
</html>