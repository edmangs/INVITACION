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
            } else {
                var curLet = 0; 
                var audio = document.getElementById("treasure-sound");
                audio.pause();
                audio.currentTime = 0;
            }
        });
    }
};

window.onload = app.tesure.getData();