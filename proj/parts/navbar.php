<style>
    .navbar-nav .nav-link.active {
        background-color: #9999FF;
        color: white;
        border-radius: 10px;
        font-weight: 600;
    }
</style>
<div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?=$pageName=='home' ? 'active' : '' ?>" href="0824-09.combine.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="product-link <?=$pageName=='list' ? 'active' : '' ?>" href="data-list.php">商品</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=$pageName=='insert' ? 'active' : '' ?>" href="data-insert.php">新增</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <?php if(isset($_SESSION['user'])): ?>
                            <li class="nav-item">
                            <a class="nav-link"><?= $_SESSION['user']['nickname'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=$pageName=='logout' ? 'active' : '' ?>" href="logout.php">登出</a>
                        </li>
                        <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link <?=$pageName=='login' ? 'active' : '' ?>" href="login.php">登入</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=$pageName=='logout' ? 'active' : '' ?>" href="logout.php">註冊</a>
                        </li>
                        <?php endif ; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
