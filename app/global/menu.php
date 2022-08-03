<div class="topnav">
    <a href="#home" class="active">fivefivesix</a>
    <div id="topLinks">
        <div class='link-div'><a class='link' href='http://localhost:8888/github/devpool/app/about/'>about</a></div>
        <?php if ($_SESSION['recruiter_isValid']) { ?>
            <div class='link-div'><a class='link' id='about-link' href='http://localhost:8888/github/devpool/app/recruiter/'>Search</a></div>
            <div class='link-div'><a class='link' id='home_link' href='http://localhost:8888/github/devpool/'>Logout</a></div>
        <?php } ?>
        <?php if ($_SESSION['talent_isValid']) { ?>
            <div class='link-div'><a class='link' href='http://localhost:8888/github/devpool/app/recruiter/'>Search</a></div>
            <div class='link-div'><a class='link' href='http://localhost:8888/github/devpool/'>Logout</a></div>
        <?php } ?>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="showMenu()">
        <i class="fa fa-bars"></i>
    </a>
</div>
<script>
    function showMenu() {
        var x = document.getElementById('topLinks');
        if (x.style.display === 'block') {
            x.style.display = 'none';
        } else {
            x.style.display = 'block';
        }
    }
</script>
<style>
    .topnav {
        overflow: hidden;
        background-color: #333;
        position: relative;
    }

    .topnav #topLinks {
        display: none;
    }

    #topLinks {
        background-color: rgb(31, 31, 31);
    }

    .topnav a {
        color: white;
        padding: 14px 16px;
        text-decoration: none;
        font-weight: 700;
        display: block;
    }

    .topnav a.icon {
        background: rgb(31, 31, 31);
        display: block;
        position: absolute;
        right: 0;
        top: 0;
    }

    .active {
        background-color: rgb(31, 31, 31);
        color: white;
        font-size: 1.5rem;
    }

    .link-div:hover {
        background-color: azure;
    }

    .link:hover {
        color: black;
        cursor: pointer;
    }
</style>