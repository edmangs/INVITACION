"use strict";

var app = {
    dev: "",
    slug: '',
    getData: function(){
        if($(".data-info").length > 0){
            if($(".data-info").attr("data-enviroment") === "dev"){
                app.dev = "/app_dev.php";
            }
        }
        if($(".data-invitation").length > 0){
            app.slug = $(".data-invitation").attr("data-slug");
        }
    }
};

window.onload = app.getData();