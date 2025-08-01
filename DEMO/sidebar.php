<?php 
?>
<!-- search form -->
<form action="" method="post" class="sidebar-form">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..." id="sMenu" autocomplete="off" onkeyup="searchMenu()">
        <span class="input-group-btn">
            <button type="button" name="search" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>
</form>
<!-- /.search form -->

<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>

    <?php
        foreach($_SESSION["MAINNAV"] as $it)
        {
            echo '<li class="treeview mainLi">
                    <a href="#">
                    <i class="fa '.$it["icon"].'"></i> <span>'.$it["menu_label"].'</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu mainUl">';

            foreach($_SESSION["SUBNAV"] as $sub)
            {
                if ($it["id"] == $sub["sub_level_one_id"])
                {
                    //if ($_SESSION["CurController"] == $it["MENU_LABEL"] && $_SESSION["CurMenuLabel"] == $sub["MENU_LABEL"])
                    if ($_SESSION["CurPage"] == $sub["id"])
                    {
                        echo '<li class="active sMenuLi"><a href=index.php?page="'. $sub["id"] .'"><i class="fa '. $sub["icon"] .'"></i> '. $sub["menu_label"] .'</a></li>';
                    }
                    else
                    {
                        echo '<li class="sMenuLi"><a href=index.php?page='. $sub["id"] .'><i class="fa '. $sub["icon"] .'"></i> '. $sub["menu_label"] .'</a></li>';
                    }
                }
            }
            echo '</ul>
            </li>';

        }
        echo '</ul>';
    ?>

<!--
    @foreach (var it in Model.privilagesParent)
    {
        <li class="treeview mainLi">
            <a href="#">
                <i class="fa @it.ICON"></i> <span>@it.MenuLable</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu mainUl">
                @foreach (var sub in Model.privilagesSub)
                {
                    if (it.NavID == sub.SubLevelOne)
                    {
                        if (userDet.CurController == it.MenuLable && userDet.CurMenuLabel == sub.MenuLable)
                        {
                            <li class="active sMenuLi"><a href="../../@sub.Ctrl/@sub.Actn"><i class="fa @sub.ICON"></i> @sub.MenuLable</a></li>
                        }
                        else
                        {
                            <li class="sMenuLi"><a href="../../@sub.Ctrl/@sub.Actn"><i class="fa @sub.ICON"></i> @sub.MenuLable</a></li>
                        }
                    }
                }
            </ul>
        </li>
    }

</ul> -->