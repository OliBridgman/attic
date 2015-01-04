<h1>$Title</h1>
<div class="content">
  $Content
</div>
<div class="bastion">
  <% loop Videos %>
  <div class="bastion-child">  
    $EmbedVideo
  </div>
  <% end_loop %>
  <% loop Images %>
  <div class="bastion-child">
    <img src="$Filename" alt="$Title image"  />
  </div>
  <% end_loop %>
</div>
