"use strict";

app.tesure = {
    treasure: "You Found a Rupee",
    tresString: "",
    getTresString: function(){
        app.tesure.tresString = app.tesure.treasure.split("");
    },
    getData: function(){
        app.tesure.getTresString();
        document.getElementById('top-checkbox').addEventListener('change', function(e){
            if(e.currentTarget.checked === true){
                var audio = document.getElementById("treasure-sound");
                audio.play(); 

                audio.onended = function() {
                    app.tesure.showLetter();
                };

            } else {
                var curLet = 0; 
                var audio = document.getElementById("treasure-sound");
                audio.pause();
                audio.currentTime = 0;

                $(".letter").addClass("hidden");
                $(".rupee").removeClass("hidden");
            }
        });
    },
    showLetter: function(){
        $(".letter").removeClass("hidden");
        $(".rupee").addClass("hidden");

        $.get(window.location.origin +  app.dev + "/game/view/invitation/" + app.slug, function(data){})
    }
};

window.onload = app.tesure.getData();