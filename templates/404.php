<title>404</title>
<style>
    * {
        margin: 0;
        padding: 0;
        background-color: #000000;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        cursor: default
    }
    
    h1 {
        font-size: 10rem;
        font-family: Roboto, sans-serif;
        font-weight: 700
    }
    
    h1,
    h2 {
        font-family: Roboto, sans-serif;
        color: #fff;
        margin-top: 30vh
    }
    
    h2 {
        margin-top: 5px
    }
    
    .container {
        width: 23rem;
        border-bottom: 3px solid #fff;
        position: relative;
        margin: 0 auto;
        padding-bottom: 10px
    }
    
    #star {
        position: absolute;
        color: #fff;
        bottom: 3rem;
        right: 23rem;
        margin-bottom: 50px;
        color: rgba(255, 0, 0, .7);
        font-size: 7rem;
        font-family: Roboto, sans-serif;
        font-weight: 700
    }
    
    @-webkit-keyframes rotation {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg)
        }
    }
    
    @keyframes rotation {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg)
        }
    }
    
    @media (max-width:430px) {
        #star {
            right: 2rem
        }
        .container {
            margin: -30px auto
        }
    }
</style>
<div class=container>
    <h1 class="animated fadeInDown">404</h1>
    <h2 class="animated fadeInUp">Page not found</h2>
</div>
<script>
if(location.href !== location.href.toLowerCase()) {
  location.href = location.href.toLowerCase();
}
</script>