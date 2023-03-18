<html>
<head>
    <title>Open webcam using JavaScript.</title>
    }
    #videoCam {
    width: 630px;
    height: 300px;
    margin-left: 0px;
    <style>
        *{
            background-color: #658EA9;
            border: 3px solid #ccc;
            background: black;
        }
        #startBtn {
            margin-left: 280px;
            width: 120px;
            height: 45px;
            cursor: pointer;
            font-weight: bold;
        }
        #startBtn:hover{
            background-color: #647C90;
            color: red;
        }
    </style>
</head>
<body>
<h1>Open WebCam Using JavaScript</h1>
<br/>
<video id="videoCam"></video>
<br/><br/>
<button id="startBtn" onclick="openCam()">Open Camera</button>
<script>
    function openCam(){
        let All_mediaDevices=navigator.mediaDevices
        if (!All_mediaDevices || !All_mediaDevices.getUserMedia) {
            console.log("getUserMedia() not supported.");
            return;
        }
        All_mediaDevices.getUserMedia({
            audio: true,
            video: true
        })
            .then(function(vidStream) {
                var video = document.getElementById('videoCam');
                if ("srcObject" in video) {
                    video.srcObject = vidStream;
                } else {
                    video.src = window.URL.createObjectURL(vidStream);
                }
                video.onloadedmetadata = function(e) {
                    video.play();
                };
            })
            .catch(function(e) {
                console.log(e.name + ": " + e.message);
            });
    }
</script>
</body>
</html>