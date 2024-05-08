var Play = "PLAY.";
var Win = "WIN.";
var Earn = "EARN.";
var speed = 500;

var naslov = document.getElementById("naslov");
animateLoop(naslov);

function animateLoop(naslov) {
    var texts = [Play, Win, Earn];
    var currentIndex = 0;

    function animateText() {
        naslov.innerHTML = "";
        var text = texts[currentIndex];
        var index = 0;


        function deleteText() {
            if (index >= 0) {
                naslov.innerHTML = text.substring(0, index);
                index--;
                setTimeout(deleteText, speed);
            } else {
   
                currentIndex = (currentIndex + 1) % texts.length;
                setTimeout(animateText, speed);
            }
        }


        function writeText() {
            if (index < text.length) {
                naslov.innerHTML += text.charAt(index);
                index++;
                setTimeout(writeText, speed);
            } else {
       
                setTimeout(deleteText, speed * 2);
            }
        }

    
        writeText();
    }

    animateText();
}