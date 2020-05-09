<header class="header">
    <nav class="nav">
        <a class=<?php echo isset($_GET['SCRIPT_NAME'])&&$_GET['SCRIPT_NAME'] == 'About' ? 'active' : 'nav__link';?>  href="?SCRIPT_NAME=About">
            About
        </a>
        <a class=<?php echo isset($_GET['SCRIPT_NAME'])&&$_GET['SCRIPT_NAME'] == 'Home' ? 'active' : 'nav__link';?>  href="?SCRIPT_NAME=Home">
            Home
        </a>
        <a class=<?php echo isset($_GET['SCRIPT_NAME'])&&$_GET['SCRIPT_NAME'] == 'Price' ? 'active' : 'nav__link';?>  href="?SCRIPT_NAME=Price">
            Price
        </a>
        <a class=<?php echo isset($_GET['SCRIPT_NAME'])&&$_GET['SCRIPT_NAME'] == 'Contacts' ? 'active' : 'nav__link';?>  href="?SCRIPT_NAME=Contacts">
            Contacts
        </a>
        <a class=<?php echo isset($_GET['SCRIPT_NAME'])&&$_GET['SCRIPT_NAME'] == 'Lab2' ? 'active' : 'nav__link';?>  href="?SCRIPT_NAME="Lab2">
            Вернуться к лабе
        </a>
    </nav>
</header>

<style>
    header {
      font-size: 2em;
      text-transform: uppercase;
    }
    .active{
        background: papayawhip;
    }
</style>