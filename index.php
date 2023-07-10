<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tool4cars</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- jQuery & jQuery Cookie -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.cookie@1.4.1/jquery.cookie.min.js"></script>

</head>
<body>
    <main class="d-flex flex-nowrap">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark m-3" style="width: 280px; height: 100%">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Tool4cars</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto" id="clientChoice">
                <li>
                    <a href="#" class="nav-link text-white clientBtn" data-cookie-value="clienta">
                        Client A
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white clientBtn" data-cookie-value="clientb">
                        Client B
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white clientBtn" data-cookie-value="clientc">
                        Client C
                    </a>
                </li>
            </ul>
            <hr>
            <a href="#" class="small text-white clientBtn" data-cookie-value="clear">Clear cookie</a>
        </div>

        <div class="d-flex flex-column p-3 m-3 border border-secondary dynamic-div" data-module="cars" data-script="ajax">
            Please select a client
            <!-- Dynamic content-->
        </div>
    </main>
</body>

<!-- Custom js files -->
<script src="/public/js/app.js"></script>

</html>
