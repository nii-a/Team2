<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>


<div class="sidebar">
    <a href="dashboard.php" class="<?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>">Home</a>
    <a href="members.php" class="<?php echo ($current_page == 'members.php') ? 'active' : ''; ?>">Members</a>
</div>
