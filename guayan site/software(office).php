<?php
    include('./login/login.php');
    if(!isset($_SESSION["user"])){
        header("location: ./login/login_page.php");
        exit();
    }
    if(isset($_GET['logout'])){
        logoutUser();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Document</title>
</head>
<body>
    <div class="banner">
        <img src="./images/van_logo.png"></img>
        <h1>Guayan</h1>
        <div class="login_details">
            <button id="operations">User: <?php echo $_SESSION["user"] ?></button>
            <div class="dropDown_menu">
                <div class="menu_links">
                    <a href="./login/delete_account.php"> Delete<br>account </a>
                </div>
                <div class="menu_links">
                    <a href="?logout"> Log out </a>
                </div>
            </div>
        </div>
    </div>
    <div class="menu" id="menu">
        <button id="operations">Operations</button>
        <div class="dropDown_menu">
            <div class="menu_links"><a href= "driver(office).php">Drivers</a></div>
            <div class="menu_links"><a href= "dashBoard(office).php">Dashboard</a></div>
            <div class="menu_links"><a href= "softWare(office).php">Software</a></div>
        </div>
    </div>
    <div class="tittle">Software</div>
    <div class="container">
        <div class="loadBoards">
            <label id="tittle">Loadboards</label>
            <div class="main">
                <div>
                    <button id="sofware_blocks" onclick="window.location.href='https://www.desmos.com/calculator/w4jhte2hol';">
                        <img src="./images/calculator.jpg">
                    </button>
                    
                </div>
                <div>
                    <button id="sofware_blocks" onclick="window.location.href='https://truckstop.com/login/';">
                        <img src="./images/truckstop.jpg">
                    </button>
                    
                </div>
                <div>
                    <button id="sofware_blocks" onclick="window.location.href='https://analytics-emea.solera.com/?currency=EUR';">
                        <img src="./images/solera.jpg">
                    </button>
                    
                </div>
                <div>
                    <button id="sofware_blocks" onclick="window.location.href='https://network.roserocket.com/#/login';">
                        <img src="./images/roserocket.webp">
                    </button>
                    
                </div>
                <div>
                    <button id="sofware_blocks" onclick="window.location.href='https://login.id.rxo.com/Account/Login?ReturnUrl=%2Fconnect%2Fauthorize%2Fcallback%3Fclient_id%3Dmarketplace_portal-prod-pm2%26response_mode%3Dform_post%26response_type%3Dcode%2520id_token%26scope%3Dopenid%2520name%2520email%2520phone%2520xpo-partner-master-api%2520mp-connect-api%2520xpo-lastmile-api%26state%3DOpenIdConnect.AuthenticationProperties%253DinDmi51X0w5eqRVD2GjgpNYCL8cmWduga-0YilP2jBouPYwBcFR1FUBxtjLxVNETdjgmNY6UrxYpGFhPaA1HfXxpcXVKaBDBEjfCksli7EfOpoF5Sb7xsx7wDfz-zmPZQguJRQBe2nPqNxkUo4A1kw%26nonce%3D638550341463447998.MGVlNTI0ZTQtYTUwZS00NzY0LWE1ZDgtZWRkYTkwNjg5ZGM4OGRlNGVmYTAtYjc1Yi00N2IwLWFjNTMtMWM0MzFiZWZmZWQ2%26redirect_uri%3Dhttps%253A%252F%252Frxoconnect.rxo.com%252Fsignin-oidc%26post_logout_redirect_uri%3Dhttps%253A%252F%252Frxoconnect.rxo.com%252F%26x-client-SKU%3DID_NET%26x-client-ver%3D1.0.40306.1554';">
                        <img src="./images/rxo.jpg">
                    </button>
                    
                </div>
                <div>
                    <button id="sofware_blocks" onclick="window.location.href='https://www.chrobinson.com/en-us/';">
                        <img src="./images/h.robinson.png">
                    </button>
                    
                </div>
                <div>
                    <button id="sofware_blocks" onclick="window.location.href='https://www.dat.com/login;'">
                        <img src="./images/dat.jpg">
                    </button>
                    
                </div>
                <div>
                    <button id="sofware_blocks" onclick="window.location.href='https://app.myvirtualfleet.com/';">
                        <img src="./images/my virtual.webp">
                    </button>
                    
                </div>
            </div>
        </div>
        <div class="locations">
            <label id="tittle">Locations</label>
            <div class="main">
                <div>
                    <button id="sofware_blocks" onclick="window.location.href='https://account.gomotive.com/log-in?referer_url=https%3A%2Fgomotive.com%2F';">
                        <img src="./images/motive.png">
                    </button>
                    
                </div>
                <div>
                    <button id="sofware_blocks">
                        <img >
                    </button>
                    
                </div>
            </div>
        </div>
        <div class="communications">
            <label id="tittle">Communications</label>
            <div class="main">
                <div>
                    <button id="sofware_blocks" onclick="window.location.href='https://app.beetexting.com/login';">
                        <img src="./images/beetexting(1).jpg">
                    </button>
                    
                </div>
                <div>
                    <button id="sofware_blocks" onclick="window.location.href='https://www.ringcentral.com/apps/beetexting';">
                        <img src="./images/ringcentral.jpeg">
                    </button>
                    
                </div>
            </div>
        </div>
    </div>
    <script> src = ".js/script.js"</script>
</body>
</html>