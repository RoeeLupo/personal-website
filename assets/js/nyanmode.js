var egg = new Egg("n,y,a,n", function () { 
    var uwu = new Audio('assets/audio/nyan.mp3');
    uwu.play();
    alert("nyan code activated, click ok to enable nyan mode");
    document.title = "nyan mode enabled";
    document.getElementById("titletext").innerHTML = "Nyan Mode";
    document.body.style.background = "url('assets/images/nyan.gif')";
    document.body.style.color = "white";
    $("body").css("background-size", "cover");
    document.getElementById("e").innerHTML = "Enjoyed this Easter egg? Star this repo on GitHub <a href='https://github.com/mrsheldon/personal-website' target=_blank'>here</a>!";
    document.getElementById("o").innerHTML = "The page will automatically refresh once the song is over!"
    document.getElementById("uwu").style.display = "none";
    uwu.onended = function() {
        location.reload();
    };
}).listen();