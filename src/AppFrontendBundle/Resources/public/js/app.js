"use strict";

var app = {
    dev: "",
    getData: function(){
        if($(".data-info").length > 0){
            if($(".data-info").attr("data-enviroment")){
                app.dev = "/app_dev.php";
            }
        }
    }
};

window.onload = app.getData(); 
//window.onload = $(document).foundation(); 