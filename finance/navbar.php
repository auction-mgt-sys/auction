<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Sidebar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .collapse a {
            text-indent: 10px;
        }
        #sidebar {
            color: #fff;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            overflow-y: auto;
            z-index: 1000;
            padding-top: 60px;
            transition: width 0.3s ease;
            background-color: black; /* Change to your desired background color */
        }
        .active {
            background-color: rgba(255, 255, 255, 0.1); /* Active item background color */
        }
        .icon-field {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <nav id="sidebar" <?php if(isset($_GET['page']) && $_GET['page'] == 'home') echo 'class="home"'; ?>>
        <div class="sidebar-list">
            <a href="index.php?page=home" class="nav-item nav-home">
                <span class="icon-field"><i class="fa fa-home"></i></span> Home
            </a>
            <a href="index.php?page=generatereport" class="nav-item nav-generatereport">
                <span class='icon-field'><i class="fa fa-file"></i></span> Generate report
            </a>
			<a href="index.php?page=viewrequest" class="nav-item nav-viewrequest">
                <span class='icon-field'><i class="fa fa-eye"></i></span> View request
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <div id="content">
        <!-- Your main content here -->
    </div>

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            const button = document.getElementById("btn1");
            const list = document.getElementById("list");
            list.style.display = "none";
            button.addEventListener("click", (event) => {
                if (list.style.display == "none") {
                    list.style.display = "block";
                } else {
                    list.style.display = "none";
                }
            });

            $('.nav_collapse').click(function(){
                console.log($(this).attr('href'));
                $($(this).attr('href')).collapse();
            });

            $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active');
        });
    </script>
</body>
</html>



