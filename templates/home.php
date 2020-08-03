<?php 
include_once 'modules/config.php'; 
include_once 'modules/mysql.php'; 
include_once 'app/helpers.php'; 

session_start();

$sql_short_desc = "SELECT * FROM generic_content WHERE id = 1";
$result_short_desc = $conn->query($sql_short_desc);
$row_short_desc = mysqli_fetch_assoc($result_short_desc);
$short_desc_content = $row_short_desc['short_desc'];

$sql_navbar = "SELECT * FROM navbar_content";
$result_navbar = $conn->query($sql_navbar);

$navbar_content = ''; 
if ($result_navbar->num_rows > 0) {
    while($row_navbar = $result_navbar->fetch_assoc()) {
      $navbar_content .= '<li class="nav-item">';
      $navbar_content .= '<a class="nav-link js-scroll-trigger active" href="';
      $navbar_content .=  $row_navbar['link'];
      $navbar_content .= '">';
      $navbar_content .=  $row_navbar['title'];
      $navbar_content .= '</a></li>';
    }
}

$sql_projects = "SELECT * FROM projects_content";
$result_projects = $conn->query($sql_projects);

$projects_content = ''; 
if ($result_projects->num_rows > 0) {
    while($row_projects = $result_projects->fetch_assoc()) {
      $projects_content .= '<div class="resume-content mr-auto"><h3 class="mb-0">';
      $projects_content .= $row_projects['name'];
      $projects_content .= '</h3><div class="subheading mb-3">';
      $projects_content .= $row_projects['role'];
      $projects_content .= '<br>';
      $projects_content .= $row_projects['tools'];
      $projects_content .= '</div><p>';
      $projects_content .= $row_projects['desc'];
      $projects_content .= '</p><p><a href="';
      $projects_content .= $row_projects['link'];
      $projects_content .= '">';
      $projects_content .= $row_projects['link_name'];
      $projects_content .= '</a></p></div>';
    }
}

$conn->close();

?>


<!--
/*-----------------------------------------------------------------------------*\
| This code is made by Roee Lupo and is licensed under the                      |
| MIT license ( https://github.com/MrSheldon/personal-website/LICENSE )         |
|                                                                               |
| GitHub: https://github.com/MrSheldon/personal-website                         |
\*-----------------------------------------------------------------------------*/
-->

<!DOCTYPE html>
<html lang="en">

<head>
<?php include_once "includes/head.php"; ?>
</head>

<body id="page-top">
<style>
#rndmskilltext {
    color: white !important;
}
</style>
        <h1 id="titletext"></h1>
        <h2 id="e"></h2>
        <h3 id="o"></h3>
        <div id="uwu">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">Roee Lupo</span>
            <span class="d-none d-lg-block">
        <h4><span style="color: white">I do &downarrow;</span></h4>
          <h3 id="rndmskilltext"><span style="color: white">[Websites]</span></h3> <br />
      </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <?= $navbar_content ?>
            </ul>
        </div>
    </nav>

    <div class="container-fluid p-0">

        <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
            <div class="my-auto">
                <h1 class="mb-0 titletextone">Roee
                    <span class="text-primary titletexttwo">Lupo</span>
                </h1>
                <div class="subheading mb-5">Rishon Lezion, Israel · +972-54-970-9979 ·
                    <a href="mailto:roee@discord.boats">roee@discord.boats</a>
                </div>
                <p class="lead mb-5">
                <?= $short_desc_content ?>             
                </p>
                <div class="social-icons">
                <a data-toggle="tooltip" title="Email" href="mailto:roee@discord.boats">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a data-toggle="tooltip" title="Github" href="https://github.com/MrSheldon">
                        <i class="fab fa-github"></i>
                    </a>
                    <a data-toggle="tooltip" title="LinkedIn" href="https://www.linkedin.com/in/roee-lupo-42a2a31b3/">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a data-toggle="tooltip" title="Twitter" href="https://twitter.com/realMrSheldon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a data-toggle="tooltip" title="Instagram" href="https://instagram.com/roeelupo">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a data-toggle="tooltip" data-html="true" title="<img src='https://mrsheldon.me/files/32300766.png' alt='Discord'>">
                        <i class="fab fa-discord"></i>
                    </a>
                    <a data-toggle="tooltip" title="Keybase" href="https://keybase.io/mrsheldon">
                        <i class="fab fa-keybase"></i>
                    </a>
                    <a data-toggle="tooltip" title="Discord Boats" href="https://discord.boats/user/mrsheldon">
                        <i><img style="position: relative; top: -2.5px;" width="42" height="42" src="https://discord.boats/logo.png" /></i>
                    </a>
                </div>
            </div>
        </section>
        <hr class="m-0">
        <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="projects">
            <div class="my-auto">
                <h2 class="mb-5">Current Projects</h2>

                <?= $projects_content ?>

                </div>
  

        </section>

        <hr class="m-0">

        <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
            <div class="my-auto">
                <h2 class="mb-5">Skills</h2>

                <div class="subheading mb-3">Programming Languages, Tools, Operation Systems and Editors</div>
                <ul class="list-inline dev-icons">
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="NodeJS - JavaScript runtime" class="devicon-nodejs-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Express - Web framework for NodeJS" class="devicon-express-original"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="TypeScript - Typed superset of JavaScript that compiles to plain JavaScript" class="devicon-typescript-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="JavaScript - High-level, interpreted programming language" class="devicon-javascript-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="jQuery - JavaScript library" class="devicon-jquery-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="HTML5 - Standard markup language for creating web pages and web applications" class="devicon-html5-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="CSS3 - Style sheet language used for describing the presentation of a document written in a markup language like HTML" class="devicon-css3-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Less - Dynamic preprocessor style sheet language that can be compiled into Cascading Style Sheets and run on the client side or server side" class="devicon-less-plain-wordmark"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Sass - Style sheet language" class="devicon-sass-original"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="PHP - Server-side scripting language designed for Web development" class="devicon-php-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Laravel - PHP web framework" class="devicon-laravel-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Bootstrap - Front-end framework for designing websites and web applications" class="devicon-bootstrap-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Angular - TypeScript-based open-source front-end web application platform" class="devicon-angularjs-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="React - JavaScript library for building user interfaces" class="devicon-react-original"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Vue.js - JavaScript framework for building user interfaces and single-page applications" class="devicon-vuejs-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Wordpress - Content management system" class="devicon-wordpress-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Elemantor - Wordpress page builder" class="fab fa-elementor"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Wix - Web development platform" class="fab fa-wix"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Magento - E-commerce platform" class="fab fa-magento"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Python - High-level programming language for general-purpose programming" class="devicon-python-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Django - Web framework for Python" class="devicon-django-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Swift - General-purpose, multi-paradigm, compiled programming language developed by Apple Inc. for iOS, macOS, watchOS, tvOS, Linux and z/OS" class="devicon-swift-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Markdown - Lightweight markup language with plain text formatting syntax" class="fab fa-markdown"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="MySQL - Database management system" class="devicon-mysql-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="MongoDB - Cross-platform document-oriented database program" class="devicon-mongodb-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Redis - In-memory data structure store, used as a database, cache and message broker" class="devicon-redis-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="NPM - Package manager for the JavaScript programming language" class="fab fa-npm"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Docker - Computer program that performs operating-system-level virtualization" class="devicon-docker-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Git - Version-control system for tracking changes in computer files and coordinating work on those files among multiple people" class="devicon-git-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="GitHub - Web-based hosting service for version control using Git" class="devicon-github-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Gitlab - Web-based Git-repository manager providing wiki, issue-tracking and CI/CD pipeline features" class="devicon-gitlab-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="GitKraken - Cross-platform git client used by many big companies (Apple, Cisco, Paypal, Microsoft, Google, Ebay and much more)" class="fab fa-gitkraken"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="cPanel - Online Linux-based web hosting control panel" class="fab fa-cpanel"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="DigitalOcean - Cloud infrastructure provider" class="fab fa-digital-ocean"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Heroku - One of the first cloud platforms, supporting several programming languages" class="devicon-heroku-original"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="AWS - Subsidiary of Amazon.com that provides on-demand cloud computing platforms to individuals, companies and governments, on a paid subscription basis" class="fab fa-aws"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Apache2 - Cross-platform web server software" class="devicon-apache-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Nginx - Web server which can also be used as a reverse proxy, load balancer, mail proxy and HTTP cache" class="devicon-nginx-original"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Windows Server - Group of server operating systems released by Microsoft" class="devicon-windows8-original"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Linux - Family of free and open-source software operating systems built around the Linux kernel" class="devicon-linux-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="WebStorm IDE - JavaScript IDE developed by JetBrains for Windows, Linux and macOS" class="devicon-webstorm-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="PyCharm IDE - Python IDE developed by JetBrains for Windows, Linux and macOS" class="devicon-pycharm-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="PhpStorm IDE - PHP IDE developed by JetBrains for Windows, Linux and macOS" class="devicon-phpstorm-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Visual Studio Code - Source code editor developed by Microsoft for Windows, Linux and macOS" class="devicon-visualstudio-plain"></i>
                    </li>
                    <li class="list-inline-item">
                        <i data-toggle="tooltip" title="Adobe Photoshop - Graphics editor developed by Adobe Systems for Windows and macOS" class="devicon-photoshop-plain"></i>
                    </li>
                </ul>
        </section>

        <hr class="m-0">

        <section class="p-3 p-lg-5 d-flex flex-column" id="copyright">
                <?php include_once "includes/footer.php"; ?>
        </section>

    </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/egg.js"></script>
    <script src="js/nyancode.js"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        window.onload = () => {
    
    const skillsShort = [
      "APIs", 
      "Websites",
      "Chat Bots",
      "Databases",
      "Servers",
      "IT",
      "Networks",
      "Web Infrastructure"
    ];
    

    i = -1;
(function f(){
    i = (i + 1) % skillsShort.length;
    rndmskilltext.innerHTML = `[${skillsShort[i]}]`;

    setTimeout(f, 1000);
 })();
  
}
        </script>
</body>

</html>
