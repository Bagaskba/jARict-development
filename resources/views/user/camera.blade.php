<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>jARict</title>
    <link rel="icon" href="/assets/logo.png" type="image/x-icon">
    <script src="https://aframe.io/releases/1.4.2/aframe.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mind-ar@1.2.2/dist/mindar-face-aframe.prod.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const list = ["shirt", "dress", "Wshirt"];
            const visibles = [false, false, false];
            let selectedIndex = -1;

            const setVisible = (button, entities, visible) => {
                if (visible) {
                    button.classList.add("selected");
                } else {
                    button.classList.remove("selected");
                }
                entities.forEach((entity) => {
                    entity.setAttribute("visible", visible);
                });
            }

            list.forEach((item, index) => {
                const button = document.querySelector("#" + item);
                const entities = document.querySelectorAll("." + item + "-entity");

                button.addEventListener('click', () => {
                    if (selectedIndex !== -1 && selectedIndex !== index) {
                        visibles[selectedIndex] = false;
                        setVisible(document.querySelector("#" + list[selectedIndex]), document
                            .querySelectorAll("." + list[selectedIndex] + "-entity"), false);
                    }
                    visibles[index] = !visibles[index];
                    setVisible(button, entities, visibles[index]);
                    if (visibles[index]) {
                        selectedIndex = index;
                    } else {
                        selectedIndex = -1;
                    }
                });
            });
        });
    </script>
    <style>
        body {
            margin: 0;
        }

        .example-container {
            overflow: hidden;
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .options-panel>div {
            text-align: center;
            margin: 0;
        }

        .options-panel {
            display: flex;
            position: relative;
            justify-content: center;
            align-items: center;
            z-index: 2;
            bottom: -80%;
        }

        .options-panel>div:first-child {
            margin-left: 0;
        }

        .options-panel>div:last-child {
            margin-right: 0;
        }

        .options-panel img {
            border: solid 3px;
            width: 100px;
            height: 100px;
            border-color: #fff;
            object-fit: cover;
            cursor: pointer;
            border-radius: 50%;
            margin-right: 25px;
        }

        .options-panel p {
            margin-right: 25px;
            color: #fff;
            size: 25;
        }

        .options-panel div.selected img {
            border-color: green;
        }

        .text-black {
            color: black;
        }
    </style>
</head>

<body>
    <div class="example-container">
        <div class="options-panel">
            <div id="shirt">
                <img src="{{ asset('storage/motive_picture/' . $select->motive_picture) }}" />
                <p class="text-black">Kemeja Pria</p>
            </div>
            <div id="dress">
                <img src="{{ asset('storage/motive_picture/' . $select->motive_picture) }}" />
                <p class="text-black">Dress</p>
            </div>
            <div id="Wshirt">
                <img src="{{ asset('storage/motive_picture/' . $select->motive_picture) }}" />
                <p class="text-black">Kemeja Wanita</p>
            </div>
        </div>
        <a-scene mindar-face embedded color-space="sRGB" renderer="colorManagement: true, physicallyCorrectLights"
            vr-mode-ui="enabled: false" device-orientation-permission-ui="enabled: false">
            <a-assets>
                <a-asset-item id="shirtModel"
                    src="{{ asset('model/scene.gltf?m=') . $select->motive_picture }}"></a-asset-item>
                <a-asset-item id="dressModel"
                    src="{{ asset('modelDress/scene.gltf?m=') . $select->motive_picture }}"></a-asset-item>
                <a-asset-item id="WshirtModel" src="{{ asset('vestido_anos_50/scene.gltf?m=') . $select->motive_picture }}""></a-asset-item>
            </a-assets>
            <a-camera active="false" position="0 0 0"></a-camera>
            <!-- head occluder -->
            <a-entity mindar-face-target="anchorIndex: 356">
                <a-gltf-model rotation="0.1 -0 0" position="-0.5 -13.5 0" scale="8 8 8" src="#shirtModel"
                    class="shirt-entity" visible="false"></a-gltf-model>
            </a-entity>
            <a-entity mindar-face-target="anchorIndex: 356">
                <a-gltf-model rotation="0.1 0 0" position="-0.5 -10.25 0" scale="0.7 0.7 0.7" src="#dressModel"
                    class="dress-entity" visible="false"></a-gltf-model>
            </a-entity>
            <a-entity mindar-face-target="anchorIndex: 356">
                <a-gltf-model rotation="0.1 0 0" position="-0.3 -9.2 0" scale="6.5 6.5 6.5" src="#WshirtModel"
                    class="Wshirt-entity" visible="false"></a-gltf-model>
            </a-entity>
        </a-scene>
    </div>
</body </html>
