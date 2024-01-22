<?php

// logout
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: index.php');
}

?>
<style>
.site-yonlendirme {
    background-color: #d92d2d;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 20px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
}


.site-yonlendirme:hover {
    background-color: #f1f1f1S;
}

.site-yonlendirme:active {
    background-color: #555555;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
}
</style>
<div class="admin-section-header">
    <div class="admin-logo">
        SineVizyon
    </div>
    <div class="admin-login-info">
        <div>
            <a href="http://localhost/graduation_project/" class="site-yonlendirme" target="_blank">Siteye Git</a>
        </div>
        <form method='post' action="">
            <input type="submit" value="Logout" class="site-yonlendirme" name="but_logout">
        </form>
        <img class="admin-user-avatar" src="../img/avatar.png" alt="">
    </div>
</div>