<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ABOUT WPCSC</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }

        html {
            box-sizing: border-box;
        }

        *, *:before, *:after {
            box-sizing: inherit;
        }

        .image {
            width: 100px;
        }

        .column {
            float: left;
            width: 33.3%;
            margin-bottom: 16px;
            padding: 0 8px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 8px;
        }

        .about-section {
            padding: 50px;
            text-align: center;
            background-color: #DADCE2;
            color: black;
        }

        .container {
            padding: 0 16px;
        }

        .container::after, .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .title {
            color: grey;
        }

        .button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
        }

        .button:hover {
            background-color: #555;
        }

        @media screen and (max-width: 650px) {
            .column {
                width: 100%;
                display: block;
            }
        }

        .footer {
            background-color: #DFE2E9;
            color: black;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            position: fixed;
            bottom: 0;
        }
    </style>
</head>

<body>

    <div class="about-section">
        <h1>ABOUT WPCSC</h1>
        <?php echo html_entity_decode($_SESSION['system']['about_content']) ?>
    </div>

    <footer class="footer">
        <div class="container">
        <div class="row justify-content-center">
                                <div class="col-lg-8 text-center">
                                    <h2 class="mt-0 text-black">Contact us</h2>
                                    <hr class="divider my-1" />
                                </div>
                            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                    <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                    <div class="text-black">011-3456782</div>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fas fa-file-export fa-3x mb-3 text-muted"></i>
                    <a class="d-block text-black" href="mailto:info@example.com">wolkitepolytecnicsatellitecampus@gmail.com</a>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fas fa-info fa-3x mb-2 text-muted"></i>
                    <a class="d-block" href="index.php?page=about">About Us</a>
                </div>
            </div>
        </div>
        <br>
        <div class="text-center text-muted">Copyright © 2024 - WPCSC AUCTION SYSTEM | <a href="https://wptc.edu.et//" target="_blank">Wolkite Polytechnic College and Satellite Campus</a></div>
    </footer>

</body>

</html>
