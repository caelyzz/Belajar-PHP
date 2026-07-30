<?php
// Bagian PHP ini hanya bertugas menyajikan file.
// Logika game sebenarnya ada di JavaScript di bawah.
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backrooms: The Chase (PHP Single File)</title>
    <style>
        body { margin: 0; overflow: hidden; background-color: #000; font-family: 'Courier New', Courier, monospace; }
        #ui-layer {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            display: flex; flex-direction: column; justify-content: center; align-items: center;
            color: #fff; background: rgba(0,0,0,0.8); z-index: 10;
        }
        #score {
            position: absolute; top: 10px; left: 10px; color: lime; font-weight: bold; font-size: 20px; z-index: 5;
            display: none;
        }
        #jumpscare {
            display: none; position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: red; z-index: 20; align-items: center; justify-content: center;
        }
        #jumpscare img { width: 100%; height: 100%; object-fit: cover; }
        h1 { text-shadow: 2px 2px #ff0000; }
        .btn { padding: 15px 30px; font-size: 20px; cursor: pointer; background: #333; color: white; border: 2px solid white; }
        .btn:hover { background: #555; }
    </style>
    <script type="importmap">
        {
            "imports": {
                "three": "https://unpkg.com/three@0.160.0/build/three.module.js",
                "three/addons/": "https://unpkg.com/three@0.160.0/examples/jsm/"
            }
        }
    </script>
</head>
<body>

    <div id="ui-layer">
        <h1>THE BACKROOMS: PHP EDITION</h1>
        <p>Gunakan W,A,S,D untuk bergerak. Mouse untuk melihat.</p>
        <p>Tahan SHIFT untuk lari.</p>
        <p>Jangan sampai tertangkap.</p>
        <button id="startBtn" class="btn">MASUK BACKROOMS</button>
    </div>

    <div id="score">Waktu Bertahan: <span id="time">0</span>s</div>

    <div id="jumpscare">
        <h1 style="font-size: 5rem; color: black;">TERTANGKAP!</h1>
    </div>

    <script type="module">
        import * as THREE from 'three';
        import { PointerLockControls } from 'three/addons/controls/PointerLockControls.js';

        // --- KONFIGURASI GAME ---
        let camera, scene, renderer, controls;
        let moveForward = false, moveBackward = false, moveLeft = false, moveRight = false, canJump = false;
        let prevTime = performance.now();
        let velocity = new THREE.Vector3();
        let direction = new THREE.Vector3();
        let walls = []; // Untuk collision
        let enemy;
        let isGameActive = false;
        let startTime;
        
        const PLAYER_SPEED = 80.0;
        const PLAYER_RUN_SPEED = 140.0;
        const ENEMY_SPEED = 3.5; // Kecepatan musuh (tambah jika ingin lebih susah)
        
        // --- SETUP AWAL ---
        function init() {
            scene = new THREE.Scene();
            // Warna kabut khas Backrooms (kuning kusam)
            scene.background = new THREE.Color(0xdebb69);
            scene.fog = new THREE.FogExp2(0xdebb69, 0.08); 

            camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            
            // Pencahayaan
            const light = new THREE.HemisphereLight(0xeeeeff, 0x777788, 0.75);
            light.position.set(0.5, 1, 0.75);
            scene.add(light);
            
            // Tambah lampu remang-remang random
            const bulb = new THREE.PointLight(0xffaa00, 1, 10);
            bulb.position.set(0, 5, 0);
            scene.add(bulb);

            // Setup Controls
            controls = new PointerLockControls(camera, document.body);

            // Event Listeners UI
            const startBtn = document.getElementById('startBtn');
            startBtn.addEventListener('click', () => {
                controls.lock();
            });

            controls.addEventListener('lock', () => {
                document.getElementById('ui-layer').style.display = 'none';
                document.getElementById('score').style.display = 'block';
                isGameActive = true;
                startTime = Date.now();
            });

            controls.addEventListener('unlock', () => {
                if(isGameActive) {
                    // Jika user tekan ESC, pause (opsional) atau biarkan menu muncul
                    document.getElementById('ui-layer').style.display = 'flex';
                }
            });

            scene.add(controls.getObject());

            // Event Keyboard
            const onKeyDown = (event) => {
                switch (event.code) {
                    case 'ArrowUp': case 'KeyW': moveForward = true; break;
                    case 'ArrowLeft': case 'KeyA': moveLeft = true; break;
                    case 'ArrowDown': case 'KeyS': moveBackward = true; break;
                    case 'ArrowRight': case 'KeyD': moveRight = true; break;
                    case 'ShiftLeft': case 'ShiftRight': velocity.y = -1; break; // Hack untuk lari detection di update
                }
            };
            const onKeyUp = (event) => {
                switch (event.code) {
                    case 'ArrowUp': case 'KeyW': moveForward = false; break;
                    case 'ArrowLeft': case 'KeyA': moveLeft = false; break;
                    case 'ArrowDown': case 'KeyS': moveBackward = false; break;
                    case 'ArrowRight': case 'KeyD': moveRight = false; break;
                }
            };
            document.addEventListener('keydown', onKeyDown);
            document.addEventListener('keyup', onKeyUp);

            // --- LEVEL GENERATION (Simple Maze) ---
            const floorGeometry = new THREE.PlaneGeometry(200, 200, 10, 10);
            floorGeometry.rotateX(-Math.PI / 2);
            
            // Texture Carpet Procedural (Warna solid + noise biar ringan)
            const floorMaterial = new THREE.MeshStandardMaterial({ color: 0xcca860 }); 
            const floor = new THREE.Mesh(floorGeometry, floorMaterial);
            scene.add(floor);

            // Ceiling
            const ceilGeometry = new THREE.PlaneGeometry(200, 200);
            ceilGeometry.rotateX(Math.PI / 2);
            ceilGeometry.translate(0, 10, 0);
            const ceilMaterial = new THREE.MeshBasicMaterial({ color: 0xdddddd });
            scene.add(new THREE.Mesh(ceilGeometry, ceilMaterial));

            // Generate Walls
            const boxGeo = new THREE.BoxGeometry(10, 10, 10);
            const boxMat = new THREE.MeshStandardMaterial({ color: 0xe6c855 }); // Kuning dinding

            // Buat labirin acak sederhana
            for (let i = 0; i < 50; i++) {
                const wall = new THREE.Mesh(boxGeo, boxMat);
                // Posisi random
                wall.position.x = (Math.random() - 0.5) * 100;
                wall.position.y = 5;
                wall.position.z = (Math.random() - 0.5) * 100;
                
                // Pastikan tidak spawn di titik awal player (0,0)
                if(Math.abs(wall.position.x) < 10 && Math.abs(wall.position.z) < 10) continue;

                scene.add(wall);
                walls.push(wall);
            }

            // --- MUSUH (THE ENTITY) ---
            const enemyGeo = new THREE.CapsuleGeometry(1, 3, 4, 8);
            const enemyMat = new THREE.MeshBasicMaterial({ color: 0x000000 }); // Hitam pekat
            enemy = new THREE.Mesh(enemyGeo, enemyMat);
            enemy.position.set(20, 3, 20); // Spawn agak jauh
            
            // Tambahkan "Mata" glowing ke musuh
            const eyeGeo = new THREE.SphereGeometry(0.2);
            const eyeMat = new THREE.MeshBasicMaterial({ color: 0xffffff });
            const eye1 = new THREE.Mesh(eyeGeo, eyeMat);
            const eye2 = new THREE.Mesh(eyeGeo, eyeMat);
            eye1.position.set(-0.3, 1, 0.8);
            eye2.position.set(0.3, 1, 0.8);
            enemy.add(eye1);
            enemy.add(eye2);

            scene.add(enemy);

            // Renderer Setup
            renderer = new THREE.WebGLRenderer({ antialias: true });
            renderer.setPixelRatio(window.devicePixelRatio);
            renderer.setSize(window.innerWidth, window.innerHeight);
            document.body.appendChild(renderer.domElement);

            window.addEventListener('resize', onWindowResize);
        }

        function onWindowResize() {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        }

        function checkCollision(nextPos) {
            // Collision deteksi sangat sederhana (Bounding Box)
            // Cek jarak player ke setiap dinding
            for (let wall of walls) {
                const dx = nextPos.x - wall.position.x;
                const dz = nextPos.z - wall.position.z;
                const dist = Math.sqrt(dx*dx + dz*dz);
                if (dist < 6) { // 6 = (WallWidth/2) + (PlayerRadius)
                    return true;
                }
            }
            return false;
        }

        function gameOver() {
            isGameActive = false;
            controls.unlock();
            document.getElementById('jumpscare').style.display = 'flex';
            setTimeout(() => {
                location.reload();
            }, 2000);
        }

        function animate() {
            requestAnimationFrame(animate);

            if (isGameActive) {
                const time = performance.now();
                const delta = (time - prevTime) / 1000;

                // --- PLAYER MOVEMENT ---
                velocity.x -= velocity.x * 10.0 * delta;
                velocity.z -= velocity.z * 10.0 * delta;

                direction.z = Number(moveForward) - Number(moveBackward);
                direction.x = Number(moveRight) - Number(moveLeft);
                direction.normalize(); 

                const currentSpeed = (document.activeElement && velocity.y === -1) ? PLAYER_RUN_SPEED : PLAYER_SPEED; // Shift logic hack

                if (moveForward || moveBackward) velocity.z -= direction.z * currentSpeed * delta;
                if (moveLeft || moveRight) velocity.x -= direction.x * currentSpeed * delta;

                controls.moveRight(-velocity.x * delta);
                controls.moveForward(-velocity.z * delta);
                
                // Update Waktu
                const survivalTime = Math.floor((Date.now() - startTime) / 1000);
                document.getElementById('time').innerText = survivalTime;

                // --- ENEMY AI (KEJAR PLAYER) ---
                const playerPos = camera.position;
                const enemyPos = enemy.position;
                
                // Vector arah musuh ke player
                const dirToPlayer = new THREE.Vector3().subVectors(playerPos, enemyPos).normalize();
                
                // Musuh bergerak
                enemy.position.add(dirToPlayer.multiplyScalar(ENEMY_SPEED * delta));
                
                // Musuh selalu menghadap player
                enemy.lookAt(playerPos);

                // --- DETEKSI KEMATIAN ---
                const distToEnemy = playerPos.distanceTo(enemyPos);
                if (distToEnemy < 2.5) {
                    gameOver();
                }

                prevTime = time;
            }

            renderer.render(scene, camera);
        }

        init();
        animate();
    </script>
</body>
</html>