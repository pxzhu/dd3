function SetThumbnail(event) {
  var reader = new FileReader();

  reader.onload = function(event) {
    var img = document.createElement("img");
    img.setAttribute("src", event.target.result);
    document.querySelector("div#u-image-container").appendChild(img);
  };

  reader.readAsDataURL(event.target.files[0]);
}

function mSetThumbnail(event) {
  var reader = new FileReader();

  reader.onload = function(event) {
    var img = document.createElement("img");
    img.setAttribute("src", event.target.result);
    document.querySelector("div#m-image-container").appendChild(img);
  };

  reader.readAsDataURL(event.target.files[0]);
}