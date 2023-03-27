<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
<div class="container">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
var modal = document.getElementById('modal');
var shade = document.getElementById('shade');
document.getElementById('start').onclick = function() {
  modal.style.display = shade.style.display = 'block';
};
document.getElementById('close').onclick = function() {
  modal.style.display = shade.style.display = 'none';
};

// This code is a workaround for IE6's lack of support for the
// position: fixed style.
//
if (!('maxHeight' in document.body.style)) {
  function modalsize() {
    var top = document.documentElement.scrollTop;
    var winsize = document.documentElement.offsetHeight;
    var docsize = document.documentElement.scrollHeight;
    shade.style.height = Math.max(winsize, docsize) + 'px';
    modal.style.top = top + Math.floor(winsize / 3) + 'px';
  };
  modal.style.position = shade.style.position = 'absolute';
  window.onscroll = window.onresize = modalsize;
  modalsize();
} </script>

<div id="shade"></div>
<div id="modal">
  <textarea rows="5" cols="25"></textarea>
  <button id="close">Close</button>
</div>
<div class="container">
<p>
  <button id="start">Start</button>
</p>
</div>

</body>
</html>