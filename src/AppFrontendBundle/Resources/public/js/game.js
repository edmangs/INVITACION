"use strict";

app.game = {
    lienzo: null,
    p1: {
        x:0,
        y:0,
            frenteURL: window.location.origin + "/bundles/appfrontend/images/link-frente.png",
            frenteOK:false,
            atrasURL: window.location.origin + "/bundles/appfrontend/images/link-atras.png",
            atrasOK:false,
            izquierdaURL: window.location.origin + "/bundles/appfrontend/images/link-izq.png",
            izquierdaOK:false,
            derechaURL: window.location.origin + "/bundles/appfrontend/images/link-der.png",
            derechaOK:false
    },
    p2: {
        x: 400,
        y: 350,
        imagenURL: window.location.origin + "/bundles/appfrontend/images/casa.png",
        imagenOK:false
    },
    velocidad: 25,
    teclas: {
        UP:38,
        DOWN:40,
        LEFT:37,
        RIGHT:39
    },
    direccion: null,
    fondo: {
        imagenURL: window.location.origin + "/bundles/appfrontend/images/fondo.png",
        fondoOK:false
    },
    init: function(){
        app.game.lienzo = document.getElementById("campo").getContext("2d");
        app.game.setData();
    },
    setData: function(){
        app.game.fondo.imagen = new Image();
        app.game.fondo.imagen.src = app.game.fondo.imagenURL;
        app.game.fondo.imagen.onload = app.game.confirmarFondo;
        //
        app.game.p1.imgFrente = new Image();
        app.game.p1.imgFrente.src = app.game.p1.frenteURL;
        app.game.p1.imgFrente.onload = app.game.confirmarFrente;
        //
        app.game.p1.imgAtras = new Image();
        app.game.p1.imgAtras.src = app.game.p1.atrasURL;
        app.game.p1.imgAtras.onload = app.game.confirmarAtras;
        //
        app.game.p1.imgIzquierda = new Image();
        app.game.p1.imgIzquierda.src = app.game.p1.izquierdaURL;
        app.game.p1.imgIzquierda.onload = app.game.confirmarIzquierda;
        //
        app.game.p1.imgDerecha = new Image();
        app.game.p1.imgDerecha.src = app.game.p1.derechaURL;
        app.game.p1.imgDerecha.onload = app.game.confirmarDerecha;
        //
        app.game.p2.imagen = new Image();
        app.game.p2.imagen.src = app.game.p2.imagenURL;
        app.game.p2.imagen.onload = app.game.confirmarLiz;
        //
        document.addEventListener("keydown", app.game.teclado);
    },
    confirmarFondo: function(){
        app.game.fondo.fondoOK = true;
        app.game.dibujar();
    },
    dibujar: function(){
        if(app.game.fondo.fondoOK === true){
            app.game.lienzo.drawImage(app.game.fondo.imagen, 0, 0);
        }
        
        if(app.game.p1.frenteOK && app.game.p1.atrasOK && app.game.p1.derechaOK && app.game.p1.izquierdaOK){
            var p1Dibujo = app.game.p1.imgFrente;
            //
            if(app.game.direccion === app.game.teclas.UP){
              var p1Dibujo = app.game.p1.imgAtras;
            }
            //
            if(app.game.direccion === app.game.teclas.DOWN){
              var p1Dibujo = app.game.p1.imgFrente;
            }
            //
            if(app.game.direccion === app.game.teclas.LEFT){
              var p1Dibujo = app.game.p1.imgIzquierda;
            }
            //
            if(app.game.direccion === app.game.teclas.RIGHT){
              var p1Dibujo = app.game.p1.imgDerecha;
            }

            app.game.lienzo.drawImage(p1Dibujo, app.game.p1.x, app.game.p1.y);
        }

        if(app.game.p2.imagenOK){
            app.game.lienzo.drawImage(app.game.p2.imagen, app.game.p2.x, app.game.p2.y);
        }
    },
    teclado: function(data){
        //console.log(data.keyCode);
        //izquierda 37, arriba 38, derecha 39, abajo 40
        if(data.keyCode === app.game.teclas.LEFT){
            if(!(app.game.p1.x === 0 || (app.game.p1.x === 250 && app.game.p1.y < 250) || (app.game.p1.x === 150 && app.game.p1.y === 200))){
                app.game.p1.x = app.game.p1.x-=app.game.velocidad;
                app.game.dibujar();
            }
        }
        //
        if(data.keyCode === app.game.teclas.UP){
            if(!(app.game.p1.y === 0 || (app.game.p1.x === 200 && app.game.p1.y === 250) || (app.game.p1.x < 150 && app.game.p1.y === 250) || (app.game.p1.x > 100 && app.game.p1.y === 400) )){
                app.game.p1.y = app.game.p1.y-=app.game.velocidad;
            }
            if((app.game.p1.x === 400 && app.game.p1.y === 400) || (app.game.p1.x === 450 && app.game.p1.y === 400)){
                console.log(app.dev);
                window.location.href = window.location.origin +  app.dev + "/game/tesure/" + app.slug;
            }
        }
        //
        if(data.keyCode === app.game.teclas.RIGHT){
            if(!(app.game.p1.x === 450 || (app.game.p1.x === 150 && app.game.p1.y < 250) || (app.game.p1.x === 100 && app.game.p1.y === 350) || (app.game.p1.x === 350 && app.game.p1.y === 400))){
                app.game.p1.x = app.game.p1.x+=app.game.velocidad;
            }
        }
        //
        if(data.keyCode === app.game.teclas.DOWN){
            if(!(app.game.p1.y === 450 || (app.game.p1.x < 150 && app.game.p1.y === 150) || (app.game.p1.x > 100 && app.game.p1.y === 300) )){
                app.game.p1.y = app.game.p1.y+=app.game.velocidad;
            }
        }      
        //
        app.game.direccion = data.keyCode;
        app.game.dibujar();
    },
    confirmarFrente: function(){
        app.game.p1.frenteOK = true;
        app.game.dibujar();
    },
    confirmarAtras: function(){
        app.game.p1.atrasOK = true;
        app.game.dibujar();
    },
    confirmarIzquierda: function(){
        app.game.p1.izquierdaOK = true;
        app.game.dibujar();
    },
    confirmarDerecha: function(){
        app.game.p1.derechaOK = true;
        app.game.dibujar();
    },
    confirmarLiz: function(){
        app.game.p2.imagenOK = true;
        app.game.dibujar();
    }
};

window.onload = app.game.init();