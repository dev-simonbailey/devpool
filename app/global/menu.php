<div class="topnav">
    <a href="#home" class="active">fivefivesix</a>
    <div id="topLinks">
        <div class='link-div'><a class='link' id='home_link'>home</a></div>
        <div class='link-div'><a class='link' id='about-link'>about</a></div>
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
    document.getElementById("home_link").innerHTML = "<a class='link' id='home_link' href='" + baseUrl + "index.php'>home</a>";
    document.getElementById("about-link").innerHTML = "<a class='link' id='about-link' href='" + baseUrl + "app/about'>about</a>";
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
    }
</style>