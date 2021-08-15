    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>BSB Race</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="//aframe.io/releases/1.1.0/aframe.min.js"></script>
        <script src="//cdn.jsdelivr.net/gh/donmccurdy/aframe-physics-system@v3.2.0/dist/aframe-physics-system.min.js"></script>
    
        <link rel="stylesheet" href="acc.css">

        <link rel="stylesheet" href="timer.css">
        <style>
            #score{
                position: absolute;

                left: 2%;

                min-width: min-content;
                
                height: min-content;

                z-index: 999;

                color: white; 
                
                font: bold Helvetica, Arial, Sans-Serif;
                text-shadow: 1px 1px #fe4902, 
                2px 2px #fe4902, 
                3px 3px #fe4902;
            }

            .dot {
                height: 30px;
                width: 30px;
                background-image: linear-gradient(45deg, red, white);
                border-radius: 50%;
                display: inline-block;
                }
            .scoreitem{
                display: inline-block;
            }    

        </style>  
    </head>
    <body>
        
        <div id="score">
            <div>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>

            <div>
                <div class="meter">
                        <span id="acc"></span>
                </div>
                <div id="time">
                    <div id="hourglass"></div>
                </div>
            </div>
            <div>
                <div id="laps">
                        <span id="min"></span>:<span id="sec"></span>:<span id="msec"></span>
                </div>
            </div>
        </div>
        
        <a-scene physics="gravity: -100" id="sce" cursor="rayOrigin: mouse" device-orientation-permission-ui="enabled: false">
            <a-assets>
                <!-- <a-asset-item id="ghost-obj" src="models/ghost/3d-model.obj"></a-asset-item> -->
                <img id="ministerioimg" src="images/ministerio.jpg" crossorigin="anonymous" /> 
                <img id="ruaimg" src="images/rua.jpg" crossorigin="anonymous" /> 
                <img id="gramaimg" src="images/grama.jpg" crossorigin="anonymous" /> 
                <img id="skyimg" src="images/sky.jpg" crossorigin="anonymous" /> 
                <img id="justicaimg" src="images/justica.png" crossorigin="anonymous" /> 
                <img id="mastroimg" src="images/mastro.png" crossorigin="anonymous" /> 
                <img id="bandeiraimg" src="images/bandeira.jpg" crossorigin="anonymous" /> 
                <img id="marbleimg" src="images/marble.jpg" crossorigin="anonymous" /> 
                <img id="startimg" src="images/start.png" crossorigin="anonymous" /> 
                <img id="logoimg" src="images/logo.png" crossorigin="anonymous" /> 

                <img id="igrejaimg" src="images/igreja.png" crossorigin="anonymous" /> 
                <img id="busimg" src="images/bus.jpg" crossorigin="anonymous" /> 
             </a-assets>
            
            <a-sky src="#skyimg" radius="6000"></a-sky> 
            
            <a-camera id="cam"  listener="stepFactor:0.005" look-controls="hmdEnabled: false; magicWindowTrackingEnabled: false"
            animation="property: rotation; from:-20 100 0;  dur: 5000; easing: easeInOutQuad; loop: 0;"
            animation__1="property: position; from:2000 300 -5000;  to: 0 1200 200; dur: 5000; easing: easeInOutQuad; loop: 0;">


            </a-camera>
            <a-box id="logo"  
            animation="property: position; from:0 620 -1620; to: 0 640 1300; dur: 2500;  delay: 90000; easing: easeInOutQuad; loop: 0;"
            material="opacity: 1; src: #logoimg; transparent:true" cursor-listener position="0 1220 80" width="150" height="25" depth="3" visible="true"></a-box>
            <a-box id="btnstart"  
            animation="property: position; from:0 600 -1650; to: 0 620 1300; dur: 2500; delay: 90000; easing: easeInOutQuad; loop: 0;"
            material="opacity: 1; src: #startimg; transparent:true" cursor-listener position="0 1200 100" width="25" height="25" depth="3" visible="true"></a-box>
            

            <a-sphere id="playerball" position="1200 10 2000" radius="10" dynamic-body visible="false"></a-sphere>
            <a-sphere  cursor-listener
                    id="ghost"
                    rotation="0 310 0"
                    radius="10"
                    color="gray"
                    shadow></a-sphere> 


            <a-box id="senado1" width="200" height="800" depth="200" position="-150 401 -2120" static-body color="gray"></a-box>
            <a-box id="camara1" width="200" height="800" depth="200" position="150 401 -2120" static-body color="gray"></a-box> 
            <a-sphere id="senado"  material="opacity: 1; repeat: 5 5; src: #marbleimg; side: double;" rotation="0 0 180" geometry="primitive:  sphere;  radius:  300;  thetaLength:  60" static-body  position="-550 300 -2120" color="gray"></a-sphere>
            <a-sphere id="camara"  material="opacity: 1; repeat: 5 5; src: #marbleimg;" geometry="primitive:  sphere;  radius:  300;  thetaLength:  60"  static-body position="550 -150 -2120" color="gray"></a-sphere>
            <a-cone id="lago" geometry="height: 5; radiusBottom: 800; radiusTop: 800; thetaLength: 180" color="blue" position="0 3 -1700" material="" rotation="0 270 0"></a-cone>

            <a-box class="grama" id="terrain" width="7000" height="0.1" depth="7000" position="0 -2 1000" static-body visible="true" color="gray" material="opacity: 1; src: #gramaimg; repeat: 20 20;"></a-box>
            <a-box class="rua" id="ruaesqterrain" width="500" height="0.4" depth="6000" position="1200 -0.5 500" static-body visible="true" color="gray" material="opacity: 1; repeat: 5 40; src: #ruaimg;"></a-box>
            <a-box class="rua" id="ruadirterrain" width="500" height="0.4" depth="6000" position="-1200 -0.5 500" static-body visible="true" color="gray" material="opacity: 1; repeat: 5 40; src: #ruaimg;"></a-box>
            
            <a-box class="grama" id="rampaterrain" width="7000" height=0.1 depth="1000" position="0 -175 -2966.5" rotation="-20 0 0" static-body visible="true" color="gray" material="opacity: 1; src: #gramaimg; repeat: 20 20;"></a-box>
            <a-box class="rua" id="ramparuaterrain" width="500" height="0.4" depth="1000" position="1200 -173.5 -2966.5" rotation="-20 0 0" static-body visible="true" color="gray" material="opacity: 1; repeat: 5 40; src: #ruaimg;"></a-box>
            <a-box class="rua" id="ramparuaterrain" width="500" height="0.4" depth="1000" position="-1200 -173.5 -2966.5" rotation="-20 0 0" static-body visible="true" color="gray" material="opacity: 1; repeat: 5 40; src: #ruaimg;"></a-box>
            
            <a-box class="grama" id="pracaterrain" width="7000" height="0.1" depth="3000" position="0 -341 -4400" static-body visible="true" color="gray" material="opacity: 1; src: #gramaimg; repeat: 20 20;"></a-box>
            <a-box class="rua" id="pracaruaterrain" width="500" height="0.4" depth="2900" position="0 -339.5 -3614" rotation="0 90 0" static-body visible="true" color="gray" material="opacity: 1; repeat: 5 40; src: #ruaimg;"></a-box>
            <a-box class="rua" id="rodoruaterrain" width="500" height="0.4" depth="2900" position="0 -0.5 3614" rotation="0 90 0" static-body visible="true" color="gray" material="opacity: 1; repeat: 5 40; src: #ruaimg;"></a-box>
            <a-box class="rua" id="rodoruaterrain2" width="500" height="0.4" depth="2900" position="0 -0.5 2400" rotation="0 90 0" static-body visible="true" color="gray" material="opacity: 1; repeat: 5 40; src: #ruaimg;"></a-box>
            
            <a-box id="rodoteto" material="opacity: 1; repeat: 5 40; src: #ruaimg;" width="400" height="30" depth="8000" rotation="0 90 0" position="0 165 3000" static-body visible="true" color="gray"> </a-box>
            <a-box id="rodobase" width="600" height="150" depth="250" position="0 75 3000" static-body visible="true" color="gray"> </a-box>
            <a-box id="bus1" position="-400 39.5 3350" material="opacity: 1; src: #busimg; repeat: 1 1;" dynamic-body color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -45 0"> </a-box>
            <a-box id="bus2" position="0 39.5 3350" material="opacity: 1; src: #busimg; repeat: 1 1;" dynamic-body color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -45 0"> </a-box>
            <a-box id="bus3" position="400 39.5 3350" material="opacity: 1; src: #busimg; repeat: 1 1;" dynamic-body color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -45 0"> </a-box>
            <a-box id="bus4" position="800 39.5 3350" material="opacity: 1; src: #busimg; repeat: 1 1;" dynamic-body color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -45 0"> </a-box>
            
            <a-box id="bus5" position="-400 39.5 2700" material="opacity: 1; src: #busimg; repeat: 1 1;"  color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -45 0"> </a-box>
            <a-box id="bus6" position="0 39.5 2700" material="opacity: 1; src: #busimg; repeat: 1 1;"  color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -45 0"> </a-box>
            <a-box id="bus7" position="400 39.5 2700" material="opacity: 1; src: #busimg; repeat: 1 1;"  color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -45 0"> </a-box>
            <a-box id="bus8" position="800 39.5 2700" material="opacity: 1; src: #busimg; repeat: 1 1;"  color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -45 0"> </a-box>

            <a-box id="bus9" position="400 217 2881" material="opacity: 1; src: #busimg; repeat: 1 1;"  color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 90 0"> </a-box>
            <a-box id="bus10" position="800 217 3125" material="opacity: 1; src: #busimg; repeat: 1 1;"  color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -90 0"> </a-box>
            <a-box id="bus11" position="-1200 217 3125" material="opacity: 1; src: #busimg; repeat: 1 1;"  color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -90 0"> </a-box>


            <a-box id="stf" width="600" height="300" depth="600" position="2000 -339 -4600" static-body visible="true" color="gray"> </a-box>
            <a-box id="justica" width="90" height="170" depth="90" position="1300 -255 -4300" material="opacity: 1; src: #justicaimg; repeat: 1 1; transparent:true" dynamic-body visible="true" color="gray"> </a-box>
            
            <a-box id="presidencia" width="600" height="300" depth="600" position="-2000 -339 -4600" static-body visible="true" color="gray"> </a-box>
            
            <a-cone id="mastro" material="opacity: 1; src: #mastroimg; repeat: 24; transparent:true" radius-bottom="60" radius-top="5" height="1000" position="0 150 -5500" visible="true" color="gray"> </a-cone>
            <a-box id="bandeira" material="opacity:1; src: #bandeiraimg" width="300" height="200" depth="1" position="150 500 -5500" static-body visible="true" color="gray"> </a-box>
            

            <a-cone material="opacity: 1; src: #igrejaimg; repeat: 20 1; transparent:true" static-body geometry="primitive: cone; height: 120; radiusBottom: 200; radiusTop: 60" position="1700 60 1700"  id="igrejabaixo"></a-cone>
            <a-cone material="opacity: 1; src: #igrejaimg; repeat: 20 1; transparent:true" static-body geometry="primitive: cone; height: 60; radiusBottom: 60; radiusTop: 120" position="1700 150 1700"  id="igrejacima"></a-cone>

            


            <a-sphere id="enemy1" enemytype="0" class="enemy" position="-1361 100 -2072" radius="20" dynamic-body visible="true" ></a-sphere>
            <a-sphere id="enemy2" enemytype="1" class="enemy" position="-1077 100 -2000" radius="20" dynamic-body visible="true" ></a-sphere>
            <a-sphere id="enemy3" enemytype="0" class="enemy" position="-1200 100 -1900" radius="20" dynamic-body visible="true" ></a-sphere>
            <a-sphere id="enemy4" enemytype="1" class="enemy" position="-1100 100 -1000" radius="20" dynamic-body visible="true" ></a-sphere>
            <a-sphere id="enemy5" enemytype="0" class="enemy" position="-1150 100 -900" radius="20" dynamic-body visible="true" ></a-sphere>
            <a-sphere id="enemy6" enemytype="1" class="enemy" position="1361 100 -2072" radius="20" dynamic-body visible="true" ></a-sphere>
            <a-sphere id="enemy7" enemytype="0" class="enemy" position="1077 100 -2000" radius="20" dynamic-body visible="true" ></a-sphere>
            <a-sphere id="enemy8" enemytype="1" class="enemy" position="1200 100 -1900" radius="20" dynamic-body visible="true" ></a-sphere>
            <a-sphere id="enemy9" enemytype="0" class="enemy" position="1100 100 -1000" radius="20" dynamic-body visible="true" ></a-sphere>
            <a-sphere id="enemy10" enemytype="1" class="enemy" position="1150 100 -900" radius="20" dynamic-body visible="true" ></a-sphere>
            
        <?php
                function setMinisterio($terrain_size){

                    $dist = 600;

                    for ($i = -($terrain_size/3); $i <= $terrain_size/3; $i = $i+$dist) {
                    echo "<a-entity
                    static-body
                    geometry=\"primitive: box; height: 200; width: 600; depth: 200; color: tomato;\"
                    material=\"opacity: 1; src: #ministerioimg; repeat: 3 3;\"
                    position=\"2000 100 ". $i ."\"></a-entity>    ";
                    
                    echo "<a-entity
                    static-body
                    geometry=\"primitive: box; height: 200; width: 600; depth: 200; color: tomato;\"
                    material=\"opacity: 1; src: #ministerioimg; repeat: 3 3;\"
                    position=\"-2000 100 ". $i ."\"></a-entity>    ";

                    }
                }

                $terrain_size = 5000;
                setMinisterio($terrain_size);
        ?>

                


    <!-- Atenção! Bug do a-frame: Se for cursor listener tem que estar depois dos text -->

        </a-scene>
    
    </body>
    <script>
    var velocities = []; 
    var hip = 1.2; 
    var maxhip_ini = 400;
    var maxhip = 400;
    var minhip = 1.2;
    var accelerating = true;
    var gameover = false;
    var gameon = false;

    const cores = ["red", "yellow"];
    


    var currtg = 0;

    var enemies = [["enemy1", 2, 300, -200],
    ["enemy2", 2, 100, -150],
    ["enemy3", 2, 200, -100],
    ["enemy4", 2, 400, -50],
    ["enemy5", 2, 350, 0],
    ["enemy6", 0, 300, 50],
    ["enemy7", 0, 250, 100],
    ["enemy8", 0, 200, 150],
    ["enemy9", 0, 150, 200],
    ["enemy10", 0, 500, -150]];


    //inicializa os enemy com a cor correspondente
    for(var i = 0; i < enemies.length; i++){
        var enemyEl = document.getElementById(enemies[i][0]);
        enemyEl.setAttribute("color", cores[Number(enemyEl.getAttribute("enemytype"))])
    }


    //chamada a cada milisegundo para atualizar a velocidade de cada enemy
    function enemyinterval(enemyn){
        var enemyEl = document.getElementById(enemies[enemyn][0]);
        const x = Number(enemyEl.getAttribute("position").x); 
        const z = Number(enemyEl.getAttribute("position").z); 

        var origVelX = Number(enemyEl.body.velocity.x);
        var origVelY = -100;//Number(enemyEl.body.velocity.y);
        var origVelZ = Number(enemyEl.body.velocity.z);
        
        const basevel = enemies[enemyn][2];
        
        const spacing = 200;
        
        var targetBase = [
        [1400,-3750],
        [-1200,-3750],
        [-1200,3750],
        [1400,3750]  
        ]

        var target = [
            [(targetBase[0][0] + enemies[enemyn][3]),(targetBase[0][1] + enemies[enemyn][3])],
            [(targetBase[1][0] + enemies[enemyn][3]),(targetBase[1][1] + enemies[enemyn][3])],
            [(targetBase[2][0] + enemies[enemyn][3]),(targetBase[2][1] + enemies[enemyn][3])],
            [(targetBase[3][0] + enemies[enemyn][3]),(targetBase[3][1] + enemies[enemyn][3])]
        ]

        for(var i = 0; i < target.length; i++){
            if(
                (x < ((target[i][0]) + spacing)) && 
                (x > ((target[i][0]) - spacing)) &&
                (z < ((target[i][1]) + spacing)) && 
                (z > ((target[i][1]) - spacing))
                ){ // chegeuei no target. vamo po porx
                enemies[enemyn][1] = i+1;
                if(enemies[enemyn][1] >= 4){
                    enemies[enemyn][1] = 0;
                }
            }
        }

        
        if(x > (target[enemies[enemyn][1]][0])+spacing){
            origVelX = (0-basevel);
        } else if(x < (target[enemies[enemyn][1]][0])-spacing){
            origVelX = (basevel);
        } else {
            origVelX = 0;
        }

        if(z > (target[enemies[enemyn][1]][1]+spacing)){
            origVelZ = (0-basevel);
        } else if(z < (target[enemies[enemyn][1]][1]-spacing)){
            origVelZ = (basevel);
        } else {
            origVelZ = 0;
        }


        try {
            enemyEl.body.velocity.set(origVelX, origVelY, origVelZ);
        } catch (e){
            console.log(e)
        }
        
    }

    setInterval(function(){
        for(var i = 0; i < enemies.length; i++){
            enemyinterval(i);
        }
    }, 250)


 



        
    var updateCamera = function(cam, ghost){
        var vector = document.getElementById("playerball").body.velocity;
        angle = THREE.Math.radToDeg( Math.atan2(vector.x,vector.z) ); 

        var hipotenusa = 3; //distance from ball
        var velocityX = hipotenusa * Math.sin(DegreesToRadians(angle));
        var velocityZ = hipotenusa * Math.cos(DegreesToRadians(angle));

        var x = document.getElementById("playerball").getAttribute("position").x;  
        var y = document.getElementById("playerball").getAttribute("position").y;
        var z = document.getElementById("playerball").getAttribute("position").z;

        var pos = x+ ", " + y + ", " + z;
        
        ghost.setAttribute("position", pos); 
        
        var rot = document.getElementById("cam").getAttribute("rotation");
    //  rot.x += 270;
        //rot.y += 180;
        ghost.setAttribute("rotation", rot);

        
        x -= velocityX * 15;
        z -= velocityZ * 15;
        y += 20; // always 10 up

        cam.components.camera.camera.parent.position.set(x, y, z);         
    }  

    AFRAME.registerComponent('cursor-listener', {
        init: function () {
            console.log("click2");
                
            this.el.addEventListener('mousedown', function (evt) {
                console.log("click");
                console.log(evt.srcElement.id)
                if(evt.srcElement.id == "btnstart"){
                    console.log("clickstart");
                    startGame();
                }
                
                accelerating = false;
            });
            this.el.addEventListener('mouseup', function (evt) {
                accelerating = true;
            });
        }
    });     
        
    function DegreesToRadians(valDeg){
        return ((2*Math.PI)/360*valDeg)
    }
        
    


    var lapcolisionlist = [];
    var colisionwhitelist = [];
    var playerEl = document.getElementById("playerball")

    //colisoes
    playerEl.addEventListener('collide', function (e) {
        
    if(e.detail.body.el.className.indexOf("grama") >=0){
            maxhip = maxhip_ini * 0.1;
        }
        if(e.detail.body.el.className.indexOf("rua") >=0){
            maxhip = maxhip_ini;    
            const id = e.detail.body.el.getAttribute("id");
            if(lapcolisionlist.indexOf(id) === -1) {
                lapcolisionlist.push(id);
            }
        }
        if(e.detail.body.el.className.indexOf("enemy") >=0){
            

            //console.log("colision: " + e.detail.body.el.getAttribute("enemytype") + " index: " + colisionwhitelist.indexOf(e.detail.body.el.getAttribute("id")));
            
            if(colisionwhitelist.indexOf(e.detail.body.el.getAttribute("id")) < 0){
                if(e.detail.body.el.getAttribute("enemytype") == 0){
                e.detail.body.el.setAttribute("enemytype", 1);
                e.detail.body.el.setAttribute("color", cores[1]);
                } else {
                    e.detail.body.el.setAttribute("enemytype", 0);
                    e.detail.body.el.setAttribute("color", cores[0]);
                }
                colisionwhitelist.push(e.detail.body.el.getAttribute("id"));
                //console.log(colisionwhitelist);
                setTimeout(function(){
                    colisionwhitelist.splice(colisionwhitelist.indexOf(e.detail.body.el.getAttribute("id"),1));
                }, 5000)
            }
        }
    }); 

//atualiza a playerball
AFRAME.registerComponent("listener", {
            schema : 
            {
                stepFactor : {
                    type : "number",
                    default : 0.05
                }
            },
            tick : function()
            {	
                var angle = (document.getElementById("cam").getAttribute("rotation").y);
                
                
                var velocityX = 10;
                var velocityY = 10;

                velocityX = hip * Math.sin(DegreesToRadians(angle))
                velocityZ = hip * Math.cos(DegreesToRadians(angle))
                
                var origVelX = document.getElementById("playerball").body.velocity.x;
                var origVelY = document.getElementById("playerball").body.velocity.y;
                var origVelZ = document.getElementById("playerball").body.velocity.z;
                
                
                //modo direto
                document.getElementById("playerball").body.velocity.set(-velocityX, origVelY, -velocityZ);
                
            
                //updade camera
                if(!gameover && gameon){
                    updateCamera(this.el, document.getElementById("ghost")); 
                } else {
                    if(gameover){
                        this.el.components.camera.camera.parent.position.set(0, 600, 1400); 
                    }
                    
                }
            }
        });


    function startGame(){

        gameon = true;
        gameover = false;

        const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;
        var distance = 0;

        var time = 0;
        const timeup = 1000 * 90;


        document.getElementById("hourglass").classList.add("hourglass");

        //placar e timer
        setInterval(function() {    
            if(time <= timeup) {
                if(
                    (lapcolisionlist.indexOf("rodoruaterrain") >= 0) &&
                    (lapcolisionlist.indexOf("ruadirterrain") >= 0) &&
                    (lapcolisionlist.indexOf("pracaruaterrain") >= 0) &&
                    (lapcolisionlist.indexOf("ruaesqterrain") >= 0)
                )
                {
                    distance = 0;
                    lapcolisionlist.length = 0;
                    document.getElementById('laps').innerHTML = 
                        document.getElementById('laps').innerHTML + "<div>"
                        + document.getElementById('min').innerHTML + ":"
                        + document.getElementById('sec').innerHTML + ":"
                        + document.getElementById('msec').innerHTML + "</div>";

                }            
                    
                    
                distance += 50;
                time += 50;
                document.getElementById('min').innerText = ('0' + (Math.floor((distance/1000)/60) % 60)).slice(-2);
                document.getElementById('sec').innerText = ('0' + (Math.floor(distance/1000) % 60)).slice(-2);  
                document.getElementById('msec').innerText = ('00' + Math.floor(distance % 1000)).slice(-3);// Math.floor((distance % (day)) / 
            
                var dots = document.getElementsByClassName("dot");
                for (var i = 0; i < dots.length; i++) {
                    dots[i].style.background= "linear-gradient(45deg, "+ cores[1] +", white)";
                }
                for (var i = 0; i < Number(document.querySelectorAll('[enemytype="0"]').length); i++) {
                    dots[i].style.background = "linear-gradient(45deg, "+ cores[0] +", white)";
                }


            } else {
                gameover=true;
                document.getElementById("hourglass").classList.remove("hourglass");
                if(!passeata){
                    iniciarPasseata();
                }
                
            }   
        }, 50)


        //acelera a playerball
        setInterval(function(){
            if(accelerating && hip <= maxhip){
                hip = hip + 50;
                //document.getElementById("ghost").setAttribute("color", "red");  
                //console.log("maxhip: " + maxhip);
                //document.getElementById("acc").innerHTML = "throttle";
                
            } 
            if((!accelerating && hip >= minhip)){
                hip = hip-50;
                //document.getElementById("ghost").setAttribute("color", "blue");  
                //document.getElementById("acc").innerHTML = "break";
            }
            if (hip >= maxhip){
                hip = hip - 10;
            }
            if (hip <= 0 || gameover){
                hip = 0;
            }

            var t = (hip / maxhip_ini)*100
            var b = 100-t;

            //document.getElementById("acc").style.background = "linear-gradient(to left, blue " + b + "%, green "+ t +"%)";
            document.getElementById("acc").style.background = "linear-gradient(to left, red, " + b + "%, green)";
            
        }, 50)  



        


    }
    

    //setTimeout(function(){startGame();}, 1000)


    var passeata = false;
    var manifestantes = 0;
    function iniciarPasseata(){

        //iniciar passeata
        passeata = true;
        function getRandomInt(min, max) {
                    min = Math.ceil(min);
                    max = Math.floor(max);
                    return Math.floor(Math.random() * (max - min)) + min;
                }

        function criaPessoa(x,z,cor){
            xanim = x + getRandomInt(-20, 20);
            zanim = z + getRandomInt(0,20);

            var sceneEl = document.querySelector('a-scene');
            var body = document.createElement('a-box');
            
            body.setAttribute("visible", "true");
            body.setAttribute("position", x + " 10 " + z);
            body.setAttribute("animation", "property: position; to: "+ xanim +" 10 "+ zanim +"; dur: 2000; easing: easeInOutQuad; loop: true; dir:alternate;");
            
            var cabeca = document.createElement('a-sphere');
            cabeca.setAttribute("radius", 6);
            cabeca.setAttribute("position", "0 16 0");
            cabeca.setAttribute("color", cor);
            body.appendChild(cabeca)
            
            var corpo = document.createElement('a-box');
            corpo.setAttribute("width", 8);
            corpo.setAttribute("height", 10);
            corpo.setAttribute("depth", 8);
            corpo.setAttribute("position", "0 5 0");
            corpo.setAttribute("color", cor);
            body.appendChild(corpo);

            var perna = document.createElement('a-box');
            perna.setAttribute("width", 3);
            perna.setAttribute("height", 20);
            perna.setAttribute("depth", 3);
            perna.setAttribute("rotation", "-20 0 0");
            perna.setAttribute("position", "-2 0 0");
            perna.setAttribute("animation", "property: rotation; to: 20 0 0; dur: 600; easing: linear; loop: true; dir:alternate");
            body.appendChild(perna);

            perna.setAttribute("rotation", "20 0 0");
            perna.setAttribute("position", "2 0 0");
            perna.setAttribute("animation", "property: rotation; to: -20 0 0; dur: 600; easing: linear; loop: true; dir:alternate");
            body.appendChild(perna);

            sceneEl.appendChild(body);
        }

        var interval = setInterval(function(){
            
                const padding = 10;
                const basex = 0;
                const basez = -700;

                const qtd = 250;

                tota = document.querySelectorAll('[enemytype="0"]').length;
                totb = document.querySelectorAll('[enemytype="1"]').length;
                
                qtda = (tota / (tota+totb)) * qtd;
                qtdb = (totb / (tota+totb)) * qtd;

                //console.log("qtda: " + qtda + "  qtdb: " + qtdb + " tota:" + tota + " totb:" + totb + " (tota / (tota+totb)): " +  (tota / (tota+totb))+ " (totb / (tota+totb)): " +  (totb / (tota+totb)))

                for (var i = 1; i <= qtda; i++) {
                    x = getRandomInt((0-(i*padding)), (i*padding)) + basex;
                    z = getRandomInt(0, (i*padding*1.3)) + basez;
                    criaPessoa(x, z, cores[0]);
                }
                for (var i = 1; i <= qtdb; i++) {
                    x = getRandomInt((0-(i*padding)), (i*padding)) + basex;
                    z = getRandomInt(0, (i*padding*1.3)) + basez;
                    criaPessoa(x, z, cores[1]);
                }
                manifestantes += 250;

                if(manifestantes >= 3000){
                    window.clearInterval(interval);
                }
        }, 1000);

    }


    </script>

       
    </html>