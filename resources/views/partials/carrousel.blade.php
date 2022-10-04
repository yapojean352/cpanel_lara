<?php use App\Models\Photo;?>
<div class="gallery">
    <div class="gallery-container">
    <?php  foreach(Photo::all()->take(5) as $keys => $ph): ?>
     <img class="gallery-item" src="{{'https://bsoccasionsplus.ca/lara/storage/app/public/'.$ph->imageUrl}} "class="responsive">             
 <?php endforeach;?>    
    </div>
    <div class="gallery-controls"></div>
  </div>

