
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function () {
    modal.style.display = "block";

    Webcam.set({
        width: 600,
        height: 600,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach('#my_camera');
    // A button for taking snaps
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
    Webcam.reset();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
        Webcam.reset();
    }

}

// preload shutter audio clip
var shutter = new Audio();
shutter.autoplay = false;
shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';

function take_snapshot() {
    // play sound effect
    shutter.play();

    // take snapshot and get image data
    Webcam.snap(function (data_uri) {
        // display results in page
        document.getElementById('image').innerHTML =
            '<img id="imageprev" name="imageprev" src="' + data_uri + '" style="width: 150px; border-radius: 50%; border: solid 5px #799e7d;"/> <input type="hidden" name="imageValue" value="' + data_uri + '"/>';
    });
    modal.style.display = "none";
    Webcam.reset();
}

function saveSnap() {
    // Get base64 value from <img id='imageprev'> source
    var base64image = document.getElementById("imageprev").src;

    Webcam.upload(base64image, 'upload.php', function (code, text) {
        console.log('Save successfully');
        //console.log(text);
    });
}