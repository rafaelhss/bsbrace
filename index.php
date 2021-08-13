    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Rafas Home Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="//aframe.io/releases/1.1.0/aframe.min.js"></script>
    
        <style>
            #score{
                position: absolute;

                left: 2%;

                min-width: min-content;
                
                height: min-content;

                z-index: 999;

                font-size: 100%;
                text-align: center; 
                color: white; 
                
                font: bold Helvetica, Arial, Sans-Serif;
                text-shadow: 1px 1px #fe4902, 
                2px 2px #fe4902, 
                3px 3px #fe4902;
            }
        </style>  
    </head>
    <body>
        
        <div id="score">
            <div>
                <h1>a  <span id="qtda">0</span>x<span id="qtdb">0</span>  b</h1>
                <h1><div id="laps"></div>
                    <span id="min">0</span>:<span id="sec">20</span>:<span id="msec">20</span>
                </h1>
            </div>
        </div>
        
        <a-scene physics="gravity: -100" id="sce" cursor="rayOrigin: mouse">
            <a-assets>
                <a-asset-item id="ghost-obj" src="models/ghost/3d-model.obj"></a-asset-item>
                <img id="ministerioimg" src="images/ministerio.jpg" crossorigin="anonymous" /> 
                <img id="ruaimg" src="images/rua.jpg" crossorigin="anonymous" /> 
                <img id="gramaimg" src="images/grama.jpg" crossorigin="anonymous" /> 

                <img id="igrejaimg" src="images/igreja.png" crossorigin="anonymous" /> 
                <img id="busimg" src="images/bus.jpg" crossorigin="anonymous" /> 
             </a-assets>
            
            <!--<a-sky src="#sky"></a-sky> -->
            
            <a-camera id="cam"  listener="stepFactor:0.105" position="0 1000 -2400" >

            </a-camera>
            

            <a-sphere id="playerball" cursor-listener position="1200 10 -2000" radius="20" dynamic-body visible="false"></a-sphere>
        


            <a-box id="senado1" width="200" height="800" depth="200" position="-150 401 -2120" dynamic-body color="gray"></a-box>
            <a-box id="camara1" width="200" height="800" depth="200" position="150 401 -2120" dynamic-body color="gray"></a-box> 
            <a-sphere id="senado"  rotation="0 0 180" geometry="primitive:  sphere;  radius:  300;  thetaLength:  60" dynamic-body  position="-550 300 -2120" color="gray"></a-sphere>
            <a-sphere id="camara"  geometry="primitive:  sphere;  radius:  300;  thetaLength:  60"  static-body position="550 -150 -2120" color="gray"></a-sphere>
            <a-cone id="lago" geometry="height: 3; radiusBottom: 800; radiusTop: 800; thetaLength: 180" color="blue" position="0 3 -1700" material="" rotation="0 270 0"></a-cone>

            <a-box class="grama" id="terrain" width="7000" height="0.1" depth="7000" position="0 -1.5 1000" static-body visible="true" color="gray" material="opacity: 1; src: #gramaimg; repeat: 20 20;"></a-box>
            <a-box class="rua" id="ruaesqterrain" width="500" height="0.2" depth="6000" position="1200 -0.5 500" static-body visible="true" color="gray" material="opacity: 1; repeat: 5 40; src: #ruaimg;"></a-box>
            <a-box class="rua" id="ruadirterrain" width="500" height="0.2" depth="6000" position="-1200 -0.5 500" static-body visible="true" color="gray" material="opacity: 1; repeat: 5 40; src: #ruaimg;"></a-box>
            
            <a-box class="grama" id="rampaterrain" width="7000" height=0.1 depth="1000" position="0 -174 -2966.5" rotation="-20 0 0" static-body visible="true" color="gray" material="opacity: 1; src: #gramaimg; repeat: 20 20;"></a-box>
            <a-box class="rua" id="ramparuaterrain" width="500" height="0.2" depth="1000" position="1200 -173.5 -2966.5" rotation="-20 0 0" static-body visible="true" color="gray" material="opacity: 1; repeat: 5 40; src: #ruaimg;"></a-box>
            <a-box class="rua" id="ramparuaterrain" width="500" height="0.2" depth="1000" position="-1200 -173.5 -2966.5" rotation="-20 0 0" static-body visible="true" color="gray" material="opacity: 1; repeat: 5 40; src: #ruaimg;"></a-box>
            
            <a-box class="grama" id="pracaterrain" width="7000" height="0.1" depth="1000" position="0 -340 -3900" static-body visible="true" color="gray" material="opacity: 1; src: #gramaimg; repeat: 20 20;"></a-box>
            <a-box class="rua" id="pracaruaterrain" width="500" height="0.2" depth="2900" position="0 -339.5 -3614" rotation="0 90 0" static-body visible="true" color="gray" material="opacity: 1; repeat: 5 40; src: #ruaimg;"></a-box>
            <a-box class="rua" id="rodoruaterrain" width="500" height="0.2" depth="2900" position="0 -0.5 3614" rotation="0 90 0" static-body visible="true" color="gray" material="opacity: 1; repeat: 5 40; src: #ruaimg;"></a-box>
            <a-box class="rua" id="rodoruaterrain2" width="500" height="0.2" depth="2900" position="0 -0.5 2400" rotation="0 90 0" static-body visible="true" color="gray" material="opacity: 1; repeat: 5 40; src: #ruaimg;"></a-box>
            
            <a-box id="rodoteto" width="1200" height="30" depth="400" position="0 165 3000" dynamic-body visible="true" color="gray"> </a-box>
            <a-box id="rodobase" width="600" height="150" depth="250" position="0 100 3000" dynamic-body visible="true" color="gray"> </a-box>
            <a-box id="bus1" position="-400 80 3350" material="opacity: 1; src: #busimg; repeat: 1 1;" dynamic-body color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -45 0"> </a-box>
            <a-box id="bus2" position="0 80 3350" material="opacity: 1; src: #busimg; repeat: 1 1;" dynamic-body color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -45 0"> </a-box>
            <a-box id="bus3" position="400 80 3350" material="opacity: 1; src: #busimg; repeat: 1 1;" dynamic-body color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -45 0"> </a-box>
            <a-box id="bus4" position="800 80 3350" material="opacity: 1; src: #busimg; repeat: 1 1;" dynamic-body color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -45 0"> </a-box>
            
            <a-box id="bus5" position="-400 80 2700" material="opacity: 1; src: #busimg; repeat: 1 1;" dynamic-body color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -45 0"> </a-box>
            <a-box id="bus6" position="0 80 2700" material="opacity: 1; src: #busimg; repeat: 1 1;" dynamic-body color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -45 0"> </a-box>
            <a-box id="bus7" position="400 80 2700" material="opacity: 1; src: #busimg; repeat: 1 1;" dynamic-body color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -45 0"> </a-box>
            <a-box id="bus8" position="800 80 2700" material="opacity: 1; src: #busimg; repeat: 1 1;" dynamic-body color="gray" geometry="width: 80; height: 80; depth: 250" rotation="0 -45 0"> </a-box>


            <a-torus color="teal" dynamic-body radius-inner="1" radius-outer="2" material="" geometry="primitive: torus; radius: 40; radiusTubular: 10; segmentsRadial: 6; segmentsTubular: 6" position="1000 60 -2000"></a-torus>
            <a-torus material="opacity: 1; src: #igrejaimg; repeat: 20 1; transparent:true" dynamic-body geometry="primitive: cone; height: 120; radiusBottom: 200; radiusTop: 60" position="1700 60 1700"  id="igrejabaixo"></a-torus>
            <a-torus material="opacity: 1; src: #igrejaimg; repeat: 20 1; transparent:true" dynamic-body geometry="primitive: cone; height: 60; radiusBottom: 60; radiusTop: 120" position="1700 150 1700"  id="igrejacima"></a-torus>

            
            <a-sphere id="enemy1" enemytype="a" class="enemy" 
            position="600 100 -100" radius="20" dynamic-body visible="true" color="yellow" ></a-sphere>
            
            <a-sphere id="enemy2" enemytype="a" class="enemy" 
            position="600 100 -500" radius="20" dynamic-body visible="true" color="green" ></a-sphere>
            
            <a-sphere id="enemy3" enemytype="b" class="enemy" 
            position="600 100 -1500" radius="20" dynamic-body visible="true" color="black" ></a-sphere>
            
            <a-sphere id="enemy4" enemytype="b" targetz="3400" class="enemy" 
            position="600 100 -800" radius="20" dynamic-body visible="true" color="gray" ></a-sphere>
            
            
        <?php
        

                function setMinisterio($terrain_size){

                    $dist = 600;

                    for ($i = -($terrain_size/4); $i <= $terrain_size/4; $i = $i+$dist) {
                    echo "<a-entity
                    dynamic-body
                    geometry=\"primitive: box; height: 200; width: 600; depth: 200; color: tomato;\"
                    material=\"opacity: 1; src: #ministerioimg; repeat: 3 3;\"
                    position=\"2000 100 ". $i ."\"></a-entity>    ";
                    
                    echo "<a-entity
                    dynamic-body
                    geometry=\"primitive: box; height: 200; width: 600; depth: 200; color: tomato;\"
                    material=\"opacity: 1; src: #ministerioimg; repeat: 3 3;\"
                    position=\"-2000 100 ". $i ."\"></a-entity>    ";

                    }
                }


                function setEnemies(){

                }

                                
                $terrain_size = 5000;
                setMinisterio($terrain_size);





                
        ?>

                


    <!-- Atenção! Bug do a-frame: Se for cursor listener tem que estar depois dos text -->
    <a-sphere  
                    
                    obj-model="obj: #ghost-obj;" 
                    id="ghost"
                    rotation="0 310 0"
                    scale="5 5 5 "
                    shadow></a-sphere> 
        </a-scene>
    </body>
    <script>
    var velocities = []; 
    var hip = 1.2; 
    var maxhip_ini = 400;
    var maxhip = 400;
    var minhip = 1.2;
    var accelerating = true;
    


    var currtg = 0;

    var enemies = [["enemy1", 0, 300, -100],
    ["enemy2", 1, 100, 50],
    ["enemy3", 2, 200, -50],
    ["enemy4", 3, 400, -150]];


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

    setInterval(function(){
        if(accelerating && hip <= maxhip){
            hip = hip + 10;
            //document.getElementById("ghost").setAttribute("color", "red");  
            //console.log("maxhip: " + maxhip);
            
        } 
        if((!accelerating && hip >= minhip)){
            hip = hip-10;
            //document.getElementById("ghost").setAttribute("color", "blue");  
        }
        if (hip >= maxhip){
            hip = hip - 15;
        }

    }, 100)   



        
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
            this.el.addEventListener('mousedown', function (evt) {
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
            updateCamera(this.el, document.getElementById("ghost")); 
        
            
        /* this.el.components.camera.camera.parent.position.add(this.el.components.camera.camera.getWorldDirection().multiplyScalar(this.data.stepFactor));
        */
        }
    });



    var lapcolisionlist = [];
    var colisionwhitelist = [];
    var playerEl = document.getElementById("playerball")

    playerEl.addEventListener('collide', function (e) {
        
    if(e.detail.body.el.className.indexOf("grama") >=0){
            maxhip = maxhip_ini * 0.1;
        }
        if(e.detail.body.el.className.indexOf("rua") >=0){
            maxhip = maxhip_ini;    
            const id = e.detail.body.el.getAttribute("id");
            if(lapcolisionlist.indexOf(id) === -1) {
                lapcolisionlist.push(id);
                console.log(lapcolisionlist)
            }
        }
        if(e.detail.body.el.className.indexOf("enemy") >=0){
            

            //console.log("colision: " + e.detail.body.el.getAttribute("enemytype") + " index: " + colisionwhitelist.indexOf(e.detail.body.el.getAttribute("id")));
            
            if(colisionwhitelist.indexOf(e.detail.body.el.getAttribute("id")) < 0){
                if(e.detail.body.el.getAttribute("enemytype") == "a"){
                e.detail.body.el.setAttribute("enemytype", "b");
                e.detail.body.el.setAttribute("color", "blue");
                } else {
                    e.detail.body.el.setAttribute("enemytype", "a");
                    e.detail.body.el.setAttribute("color", "red");
                }
                colisionwhitelist.push(e.detail.body.el.getAttribute("id"));
                //console.log(colisionwhitelist);
                setTimeout(function(){
                    colisionwhitelist.splice(colisionwhitelist.indexOf(e.detail.body.el.getAttribute("id"),1));
                }, 5000)
            }
        }
    }); 


    const second = 1000,
    minute = second * 60,
    hour = minute * 60,
    day = hour * 24;
    var distance = 0;


    x = setInterval(function() {    
                    
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
        document.getElementById('min').innerText = ('0' + (Math.floor((distance/1000)/60) % 60)).slice(-2);
        document.getElementById('sec').innerText = ('0' + (Math.floor(distance/1000) % 60)).slice(-2);  
        document.getElementById('msec').innerText = ('00' + Math.floor(distance % 1000)).slice(-3);// Math.floor((distance % (day)) / 

        //}
    

        document.getElementById('qtda').innerText = document.querySelectorAll('[enemytype="a"]').length;
        document.getElementById('qtdb').innerText = document.querySelectorAll('[enemytype="b"]').length;

    }, 50)


    </script>

    <script src="//cdn.jsdelivr.net/gh/donmccurdy/aframe-physics-system@v3.2.0/dist/aframe-physics-system.min.js"></script>
       
    </html>