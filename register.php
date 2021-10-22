<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> 寵愛NEE後台管理 </title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- Boxicons CDN Link -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
    <link rel="icon" href="./img/LOGO100x100.png">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="fas fa-database"></i>
            <span class="logo_name">寵愛NEE後台</span>

        </div>
        <ul class="nav-links">
            <li>
                <a href="./商品管理-HTML版.html">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="links_name">商品管理</span>
                </a>
            </li>
            <li>
                <a href="./訂單查詢.html">
                    <i class="fas fa-sticky-note"></i>
                    <span class="links_name">訂單查詢</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-clipboard"></i>
                    <span class="links_name">預約查詢</span>
                </a>
            </li>

            <li>
                <a href="./new.html">
                    <i class="fab fa-facebook-messenger"></i>
                    <span class="links_name">消息管理</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-cogs"></i>
                    <span class="links_name">設定</span>
                </a>
            </li>
            <li class="log_in">
                <a href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="links_name">登入</span>
                </a>
            </li>
        </ul>
    </div>


    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="fas fa-align-justify sidebarBtn"></i>
            </div>
            <span class="btn btn-primary">登入</span>
        </nav>
        <div style="height: 50px;">
        </div>
        <main class="mt-5 pt-3">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-header" style="background-color:white;">

                                <div style="display: flex;">
                                    <h2> <i class="fas fa-cogs" style="display: block; justify-content: left;">註冊</i>
                                    </h2>
                                </div>

                            </div>
                            <form action="/action_page.php">
                                <div class="form-group">
                                    <label for="old-pwd">信箱</label>
                                    <input type="password" class="form-control" id="old-pwd">
                                </div>
                                <div class="form-group">
                                    <label for="new-pwd">密碼</label>
                                    <input type="password" class="form-control" id="new-pwd">
                                </div>
                                <div class="form-group">
                                    <label for="re-pwd">確認密碼</label>
                                    <input type="password" class="form-control" id="re-pwd">
                                </div>
                                <div class="form-group">
                                    <label for="re-pwd">身份</label>
                                    <input type="password" class="form-control" id="re-pwd">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-warning mx-2">註冊</button>
                                    <button type="submit" class="btn btn-success mx-2">登入</button>
                                </div>
                            </form>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>



    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>