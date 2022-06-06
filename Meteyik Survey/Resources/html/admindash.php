<style>
    * {
        margin: 0;
        padding: 0;
    }

    #container {
        display: flex;
        flex-direction: row;
    }

    #side-nav {
        width: 220px;
        height: 100vh;
        padding: 0.3rem 3rem;
    }

    #content {
        padding: 1rem 3rem;
    }

    .switch-button {
        border: none;
        color: #232323;
        background-color: transparent;
        display: block;
        font-size: 1.2rem;
        cursor: pointer;
    }
</style>
<?php
include("../php/header.php");
?>
<div id="container">
    <div id="side-nav">
        <form method="GET" action="">
            <button class="switch-button" name="table" value="user">Users Table</button>
            <button class="switch-button" name="table" value="org">Organization Table</button>
        </form>
    </div>
    <div id="content">
        <?php
        if (!isset($_GET['table'])) {
            include("./user-display.php");
        }
        if (isset($_GET['table'])) {
            $table = $_GET['table'];
            if ($table == "user") {
                include("./user-display.php");
            } elseif ($table == "org") {
                include("./organization-display.php");
            }
        }
        ?>
    </div>

</div>