/*
  _____                          ______       _                       _               
 |  __ \                        |  ____|     | |                     (_)              
 | |  | | ___ _ __ _ __  _   _  | |__   _ __ | |_ ___ _ __ _ __  _ __ _ ___  ___  ___ 
 | |  | |/ _ \ '__| '_ \| | | | |  __| | '_ \| __/ _ \ '__| '_ \| '__| / __|/ _ \/ __|
 | |__| |  __/ |  | |_) | |_| | | |____| | | | ||  __/ |  | |_) | |  | \__ \  __/\__ \
 |_____/ \___|_|  | .__/ \__, | |______|_| |_|\__\___|_|  | .__/|_|  |_|___/\___||___/
                  | |     __/ |                           | |                         
                  |_|    |___/                            |_|                
MIT License
Github: https://github.com/ohlookitsderpy/derpyenterprises.org

Modified by Roee Lupo (aka MrSheldon)
*/

$( document ).ready(function() {
    localStorage.removeItem("nyan")
});

var egg = new Egg("n,y,a,n", function () { 
    if (localStorage.getItem("nyan") == "on") return console.log("nyan mode enabled")
    else {
        localStorage.setItem("nyan", "on")
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
            localStorage.removeItem("nyan")
        };
    }
}).listen();