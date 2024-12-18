<?php
    session_start();
    require_once(__DIR__ . '/../../models/News.php');

    $news = new News();
    $allNews = $news->getAllNews();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['username'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Xin chào, <strong><?= $_SESSION['username'] ?></strong>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="userMenu">
                                <li><a class="dropdown-item" href="../admin/logout.php">Đăng xuất</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/login.php">Đăng nhập</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <a href="news/add.php" class="btn btn-success my-3">Thêm mới</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Image</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Category ID</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($allNews as $news) {
            ?>
                    <tr>
                        <th class="align-middle"><?= $news['title']; ?></th>
                        <td class="align-middle"><?= $news['content']; ?></td>
                        <td class="align-middle"><img src="../../<?= $news['image']; ?>" alt="<?= $news['title']; ?>" style="width: 100px; height: auto;"></td>
                        <td class="align-middle"><?= $news['created_at']; ?></td>
                        <td class="align-middle"><?= $news['category_id']; ?></td>
                        <td class="align-middle">
                            <a href="news/edit.php?id=<?= $news['id'] ?>">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td class="align-middle">
                            <a href="../../index.php?controller=news&action=delete&id=<?= $news['id']; ?>" 
                                onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </td>
                    </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>