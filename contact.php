<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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

        .contact-section {
            /* Add styles for contact section if needed */
        }

        h2 {
            text-align: center;
        }

        .row {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
        }

        .column {
            width: 30%;
            margin-bottom: 16px;
            padding: 0 8px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 8px;
            text-align: center;
        }

        .image {
            width: 100px; /* Adjust size of the image */
            border-radius: 50%; /* Make image round */
        }

        .container {
            padding: 0 16px;
        }

        .title {
            color: grey;
        }

        h3 {
            font-size: 20px; /* Decrease size of the name */
        }

        p {
            text-align: justify; /* Justify text */
        }

        @media screen and (max-width: 650px) {
            .column {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<!-- Masthead-->
<!-- <div class="contact-section">
    <!-- Add content for contact section if needed -->
</div> -->

<h2>Our Team</h2>

<div class="row">
    <div class="column">
        <div class="card">
            <img class="image" src="images/hanni.jpg" alt="HANNA">
            <div class="container">
                <h3>HANNA SEMU</h3>
                <p class="title">Website Developer</p>
                <p>A student at Wolkite University. She developed this website for a graduation industrial project and for use in any auction process that the organization issues regularly!</p>
                <p><i class="icon fas fa-envelope"></i><a href="mailto:hannasemu@gmail.com">hannasemu@gmail.com</a></p>
                <p><i class="icon fab fa-linkedin"></i><a href="https://www.linkedin.com/in/HannaSemu" target="_blank"> HannaSemu</a></p>
        
            </div>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <img class="image" src="images/elu.jpg" alt="ELENI">
            <div class="container">
                <h3>ELENI BEYENE</h3>
                <p class="title">Website Developer</p>
                <p>A student at Wolkite University. She developed this website for a graduation industrial project and for use in any auction process that the organization issues regularly!</p>
                <p><i class="icon fas fa-envelope"></i><a href="mailto:elenibeyene@gmail.com">elenibeyene@gmail.com</a></p>
                <p><i class="icon fab fa-linkedin"></i><a href="https://www.linkedin.com/in/elenibeyene" target="_blank"> elenibeyene</a></p>
        
            </div>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <img class="image" src="images/elshu.jpg" alt="ELSHADAI">
            <div class="container">
                <h3>ELSHADAI MELESSE</h3>
                <p class="title">Website Developer</p>
                <p>A student at Wolkite University. She developed this website for a graduation industrial project and for use in any auction process that the organization issues regularly!</p>
                <p><i class="icon fas fa-envelope"></i><a href="mailto:elshadaimelesse@gmail.com">elshadaimelesse@gmail.com</a></p>
                <p><i class="icon fab fa-linkedin"></i><a href="https://www.linkedin.com/in/elshadaimelesse" target="_blank"> elshadaimelesse</a></p>
            
                
            </div>
        </div>
    </div>
</div>

</body>
</html>
