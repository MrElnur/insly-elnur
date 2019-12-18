<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Elnur">

<title>Insly test</title>

<!-- load bootstrap from a cdn -->
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" rel="stylesheet">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<style>
    .nav {
        position: relative;
        left:25%;
    }
    .current_page_item a {
        color: #2cff31 !important;
    }
    .nav ul {
        list-style: none;
        background-color: #444;
        text-align: center;
        position: relative;
    }

    .nav a {
        text-decoration: none;
        color: #fff;
        display: block;
        transition: .3s background-color;
    }

    .nav a:hover {
        background-color: #005f5f;
    }
    .navbar-dark .navbar-nav > .active{
        color: #000;
        background: #d65c14;
    }
    .navbar-dark .navbar-nav > .active > a,
    .navbar-default .navbar-nav > .active > a:hover,
    .navbar-default .navbar-nav > .active > a:focus {
        color: #000;
        background: #d65c14;
    }
    .nav a.active {
        background-color: #fff;
        color: #444;
        cursor: default;
    }

    @media screen and (min-width: 400px) {


        /* Option 1 - Display Inline */
        .nav li {
            display: inline-block;
        }

        /* Options 2 - Float
        .nav li {
          float: left;
        }
        .nav ul {
          overflow: auto;
          width: 600px;
          margin: 0 auto;
        }
        .nav {
          background-color: #444;
        }
        */
    }

</style>
