<?php
	require('connect.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
		$email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $postalcode = $_POST['postalcode'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $query = "INSERT INTO `user` (username, password, email,address,city,country, state, postalcode, phone) VALUES ('$username', '$password', '$email', '$address', '$city', '$country', '$state', '$postalcode', '$phone')";
        $result = mysql_query($query);
        if($result){
            $msg = "User Created Successfully.";
        }


    if(isset($msg) & !empty($msg)){
        echo $msg;
    }
    echo "<a href='logout.php'>Logout</a>";

}
else{
?>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Simple Sign Up Form</title>

    <!---------- CSS ------------>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script type="text/javascript" src="js/countries.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/site.js"></script>
</head>

<body>
<div id="container">
    <div id="header">
        <p id="header_title"> Simple Form Header <p>
    </div>

    <!--BEGIN #signup-form -->
    <form action="" method="POST">
    <div id="content">
        <div id="signup-form">

            <!--BEGIN #subscribe-inner -->
            <div id="signup-inner">

                <div class="clearfix" id="header">
                    <h1>User Registration From </h1>
                </div>
                <p>Please complete the fields below, ensuring you use a valid email address as you will be sent a
                    validation
                    code which you will need the first time you login to the site.</p>

                <form id="contact" action="" method="post">
                    <p>
                        <label>User Name : </label>
                        <input id="username" type="text" name="username" placeholder="username" /></p>
                    <p>
                        <label for="fullname"> Name *</label>
                        <input id="fullname" type="text" name="fullname" placeholder="Your Full Name" value="" class="validate"/>
                        <span class="error">This field is required</span>
                    </p>

                    <p>
                        <label for="email">Email *</label>
                        <input id="email" type="text" name="email" placeholder="Your Email" value="" class="validate"/>
                        <span class="error">A valid email address is required</span>	
                    </p>
                    <p>
                        <label>Password&nbsp;&nbsp; : </label>
                        <input id="password" type="password" name="password" placeholder="password" /></p>
                    <p>
                        <label for="address">Address</label>
                        <input id="address" type="text" name="address" placeholder="Your Address" value=""/>
                    </p>

                    <p>
                        <label for="city">City</label>
                        <input id="city" type="text" name="city" placeholder="Your City" value=""/>
                    </p>

                    <p>
                        <label for="country">Country</label>
                        <select id="country" type="text" name="country" placeholder="Your Country"></select>
                    </p>

                    <p>
                        <label for="state">State</label>
                        <select id="state" name="state" type="text"></select>
                    </p>
                    <p>
                        <label for="postalcode">Postal Code</label>
                        <input id="postalcode" type="text" name="postalcode" placeholder="Your Postal Code" value="" class="validate"/>
                        <span class="error">A valid postalcode is required</span>
                    </p>
                    <p>

                        <label for="phone">Phone</label>
                        <input id="phone" type="text" name="phone" placeholder="Your Phone" value=""/>
                    </p>

                    <p id="contact_submit">	
                        <button id="submit" type="submit">Submit</button>
                    </p>

                <div id="required">
                    <p>* Required Fields</p>
                </div>
            </div>
            <!--END #signup-inner -->
        </div>
        <!--END #signup-form -->
    </div>
    </form>
    <div id="wrapper">


        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="index.php">Home</a></li>
            </ul>
        </div>
    </div>

    <div id="footer">
        <p> @Golam Maruf </p>
    </div>
</div>
<?php } ?>
</body>
</html>
