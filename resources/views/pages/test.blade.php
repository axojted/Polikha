<!DOCTYPE html>
<html style="width:100%;height:100%;" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    *{
        margin:0px;
        padding: 0px;
    }
    #game-container{
        width: 800px;
        height: 600px;
        background: #e1e1e1;

        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        z-index: -99;
    }
</style>
<body style="height:100%; width: 100%;">
    <div id="game-container">
        <canvas id="canvas">

        </canvas>
    </div>

    <script>
        var canvas = document.getElementById('canvas');
        var canvasContainer = document.getElementById('game-container')
        var player = canvas.getContext('2d');
        canvas.width = 800;
        canvas.height = 600;
        player.maxX = 650;
        player.minX = 0;
        player.speed = 1;
        player.moveX = 0;

        document.addEventListener('keydown',function(e){

            if(e.keyCode == 39)
            {
                player.speed = 1
            }else if(e.keyCode == 37)
            {
                //left
                player.speed = -1;
            }
        })
        function resetCanvas()
        {
            let reset = canvas.getContext('2d');
            
            reset.fillStyle = '#e1e1e1';
            reset.fillRect(0,0,800,800);
        }
        function drawPlayer()
        {
            player.fillStyle = '#111111';
            player.fillRect(player.moveX,600-10,150,10);
        }
        function movePlayer()
        {
            if(player.moveX > 650)
            {
                player.speed = -player.speed;
            }
            if(player.moveX < 0){
                player.speed = !player.speed;
            }

            player.moveX += player.speed;
            resetCanvas();
            drawPlayer();
            setTimeout(movePlayer,.38);
        }
        movePlayer();

        // },250);

    </script>
</body>
</html>