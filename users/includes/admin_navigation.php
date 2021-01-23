<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
        font-family: "Lato", sans-serif;
    }

    .sidenav {
        height: 100%;
        width: 200px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;
    }

    .sidenav a {
        padding: 6px 6px 6px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #6e6e7c;
        display: block;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }


    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }
    </style>
</head>

<body>

    <div class="sidenav">
        <a href="./user_index.php">Home</a>
        <a href="home.php?action=">Import List</a>
        <a href="index.php?action=">Products</a>
        <a href="find_products.php?action=">Notification</a>
        <a href="index.php?action=products">Find Products</a>
    </div>

</body>

</html>


       