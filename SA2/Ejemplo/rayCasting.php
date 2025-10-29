<?php
// Solo sirve la página HTML + JS, no genera la imagen en PHP
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title>Raycaster SVG interactivo</title>
<style>
  body { margin: 0; background: #222; }
  #game { display: block; margin: 0 auto; background: #333; }
  #info {
    color: #eee; font-family: monospace; text-align: center;
    margin-top: 10px;
  }
</style>
</head>
<body>

<svg id="game" width="900" height="600"></svg>
<div id="info">Usa las teclas W,A,S,D para mover y rotar. Canario y Elio dejad de marujear!</div>

<script>
(() => {
  const svg = document.getElementById('game');
  const screenWidth = 900;
  const screenHeight = 600;
  const numRays = 200;        // Más rayos = imagen más suave
  const fov = Math.PI / 3;    // 60 grados
  const maxDepth = 20;

  const map = [
    [1,1,1,1,1,1,1,1,1,1],
    [1,0,0,0,0,0,0,0,0,1],
    [1,0,1,0,1,1,0,1,0,1],
    [1,0,1,0,0,0,0,1,0,1],
    [1,0,1,1,1,1,0,1,0,1],
    [1,0,0,0,0,0,0,1,0,1],
    [1,0,1,1,1,1,0,1,0,1],
    [1,0,1,0,0,0,0,0,0,1],
    [1,0,0,0,1,0,0,0,0,1],
    [1,1,1,1,1,1,1,1,1,1],
  ];

  const mapWidth = map[0].length;
  const mapHeight = map.length;

  let playerX = 1.5;
  let playerY = 1.5;
  let playerAngle = 0;

  // Variables de movimiento
  const moveSpeed = 0.05;
  const rotSpeed = 0.03;

  // Estado de teclas
  const keys = { w:false, a:false, s:false, d:false };

  // Crear fondo cielo y suelo una sola vez
  const floorRect = document.createElementNS("http://www.w3.org/2000/svg", "rect");
  floorRect.setAttribute("x", 0);
  floorRect.setAttribute("y", screenHeight/2);
  floorRect.setAttribute("width", screenWidth);
  floorRect.setAttribute("height", screenHeight/2);
  floorRect.setAttribute("fill", "rgb(100,100,100)");
  svg.appendChild(floorRect);

  const ceilingRect = document.createElementNS("http://www.w3.org/2000/svg", "rect");
  ceilingRect.setAttribute("x", 0);
  ceilingRect.setAttribute("y", 0);
  ceilingRect.setAttribute("width", screenWidth);
  ceilingRect.setAttribute("height", screenHeight/2);
  ceilingRect.setAttribute("fill", "rgb(50,50,50)");
  svg.appendChild(ceilingRect);

  // Crear barras para cada rayo (rectángulos)
  const bars = [];
  const barWidth = screenWidth / numRays;
  for(let i=0; i<numRays; i++) {
    const rect = document.createElementNS("http://www.w3.org/2000/svg", "rect");
    rect.setAttribute("x", i * barWidth);
    rect.setAttribute("width", barWidth + 1);  // +1 para evitar gaps
    svg.appendChild(rect);
    bars.push(rect);
  }

  function castRays() {
    for(let ray=0; ray<numRays; ray++) {
      const rayAngle = playerAngle - fov/2 + (ray/numRays)*fov;

      let distanceToWall = 0;
      let hitWall = false;
      const stepSize = 0.02;

      while(!hitWall && distanceToWall < maxDepth) {
        distanceToWall += stepSize;

        const testX = playerX + Math.cos(rayAngle) * distanceToWall;
        const testY = playerY + Math.sin(rayAngle) * distanceToWall;

        const mapX = Math.floor(testX);
        const mapY = Math.floor(testY);

        if(mapX < 0 || mapX >= mapWidth || mapY < 0 || mapY >= mapHeight) {
          hitWall = true;
          distanceToWall = maxDepth;
        } else if(map[mapY][mapX] === 1) {
          hitWall = true;
        }
      }

      const correctedDist = distanceToWall * Math.cos(rayAngle - playerAngle) || 0.0001;
      const lineHeight = screenHeight / correctedDist;
      const drawStart = (screenHeight/2) - (lineHeight/2);

      const shade = Math.max(0, 255 - (correctedDist * 12));
      const color = `rgb(${shade},${shade},${shade})`;

      const bar = bars[ray];
      bar.setAttribute("y", drawStart);
      bar.setAttribute("height", lineHeight);
      bar.setAttribute("fill", color);
    }
  }

  // Actualizar posición del jugador según teclas
  function updatePosition() {
    if(keys.w) {
      const newX = playerX + Math.cos(playerAngle) * moveSpeed;
      const newY = playerY + Math.sin(playerAngle) * moveSpeed;
      if(map[Math.floor(newY)][Math.floor(newX)] === 0) {
        playerX = newX;
        playerY = newY;
      }
    }
    if(keys.s) {
      const newX = playerX - Math.cos(playerAngle) * moveSpeed;
      const newY = playerY - Math.sin(playerAngle) * moveSpeed;
      if(map[Math.floor(newY)][Math.floor(newX)] === 0) {
        playerX = newX;
        playerY = newY;
      }
    }
    if(keys.a) {
      playerAngle -= rotSpeed;
    }
    if(keys.d) {
      playerAngle += rotSpeed;
    }
  }

  // Detectar teclado
  window.addEventListener("keydown", e => {
    switch(e.key.toLowerCase()) {
      case 'w': keys.w = true; break;
      case 'a': keys.a = true; break;
      case 's': keys.s = true; break;
      case 'd': keys.d = true; break;
    }
  });
  window.addEventListener("keyup", e => {
    switch(e.key.toLowerCase()) {
      case 'w': keys.w = false; break;
      case 'a': keys.a = false; break;
      case 's': keys.s = false; break;
      case 'd': keys.d = false; break;
    }
  });

  function gameLoop() {
    updatePosition();
    castRays();
    requestAnimationFrame(gameLoop);
  }

  castRays();
  requestAnimationFrame(gameLoop);

})();
</script>

</body>
</html>
