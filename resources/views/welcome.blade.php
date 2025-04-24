<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- AOS Animation Library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6f42c1;
            --hover-color: #5e35b1;
            --card-bg: #ffffff;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .text-purple {
            color: var(--primary-color);
        }

        .card {
            transition: all 0.3s ease;
            cursor: pointer;
            background: var(--card-bg);
            border-radius: 15px;
            overflow: hidden;
            height: 100%;
            position: relative;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(111, 66, 193, 0.2) !important;
        }

        .card:hover .card-icon {
            transform: scale(1.2);
        }

        .card:hover .card-title {
            color: var(--hover-color);
        }

        .card:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 5px;
            background: var(--primary-color);
            transition: width 0.5s ease;
        }

        .card:hover:after {
            width: 100%;
        }

        .card-icon {
            transition: all 0.5s ease;
            color: var(--primary-color);
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .display-count {
            font-size: 2.5rem;
            font-weight: bold;
            margin: 0.5rem 0;
        }

        .alert-custom {
            background-color: rgba(111, 66, 193, 0.1);
            border-left: 5px solid var(--primary-color);
            color: #333;
            padding: 1.5rem;
            border-radius: 8px;
            margin-top: 3rem;
        }

        .page-header {
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid rgba(111, 66, 193, 0.2);
        }

        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem;
        }

        .card-link {
            text-decoration: none;
            color: inherit;
            display: block;
            height: 100%;
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        .counter {
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <h1 class="text-center page-header" data-aos="fade-down">Book Management System</h1>

    <div class="row text-center g-4">

        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
            <a href="/authors" class="card-link">
                <div class="card shadow-lg border-0 h-100">
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="bi bi-person-lines-fill text-purple"></i>
                        </div>
                        <h5 class="card-title mt-3 text-purple">Authors</h5>
                        <p class="display-count counter">{{$authorsCount}}</p>
                        <p class="text-muted">Total number of authors in the system</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Book card -->
        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
            <a href="/books" class="card-link">
                <div class="card shadow-lg border-0 h-100">
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="bi bi-book-half text-purple"></i>
                        </div>
                        <h5 class="card-title mt-3 text-purple">books</h5>
                        <p class="display-count counter">{{$booksCount}}</p>
                        <p class="text-muted">Total number of books in the system</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Category card -->
        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
            <a href="/categories" class="card-link">
                <div class="card shadow-lg border-0 h-100">
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="bi bi-tags text-purple"></i>
                        </div>
                        <h5 class="card-title mt-3 text-purple">Categories</h5>
                        <p class="display-count counter">{{$categoriesCount}}</p>
                        <p class="text-muted">Total number of categories in the system</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12" data-aos="fade-up" data-aos-delay="400">
            <div class="alert-custom pulse">
                <h4 class="mb-3"><i class="bi bi-info-circle-fill me-2"></i>Welcome to the Book Management System!</h4>
                <p class="mb-0">You can easily manage authors, books, and categories through the system. Click on any card for direct access to the required section.</p>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });

    $(document).ready(function() {
        $('.counter').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 2000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });
</script>
</body>
</html>
