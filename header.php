<?php
require_once './helpers/MemberDao.php';
require_once './helpers/CartDAO.php'; 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$member = $_SESSION['member'] ?? null;

$cartItemCount = 0;
if ($member) {
    $cartDao = new CartDAO();
    $cartItems = $cartDao->get_cart_by_memberid($member->memberid);
    foreach ($cartItems as $item) {
        $cartItemCount += $item->num; // 数量合計
    }
}
?>

<header>
    <link href ="css/HeaderStyle.css" rel="stylesheet">
    <div id="logo">
        <a href="index.php">
            <img src="./images/JecShoppingLogo.jpg" alt="JEC Shoppingロゴ" />
        </a>
        </div>
    <div id="link">
    <form action="index.php" method="get">
            <input type="text" name="keyword" />
            <input type="submit" value="検索" />
        </form>
        <?php if ($member): ?>
            <?= htmlspecialchars($member->membername, ENT_QUOTES, 'UTF-8') ?>さん
            <a href="cart.php">カート (<?= $cartItemCount ?>)</a>
            <a href="logout.php">ログアウト</a>
        <?php else: ?>
           <a href="login.php">ログイン</a>
        <?php endif; ?>
    </div>
    <div id="clear">
        <hr>
        </div>
</header>
