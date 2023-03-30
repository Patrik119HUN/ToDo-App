<?php function NavItem(string $path, string $name)
{
    $activePage = basename($_SERVER['PHP_SELF'], ".php");
    $class = ($activePage==$path) ? 'active' : '';
    echo "<li class=$class ><a href=$path>$name</a></li>";
}
