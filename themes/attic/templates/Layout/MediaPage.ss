<h1>$Title</h1>
<div class="content">
  $Content
</div>
<div class="bastion video">
  <% loop Videos %>
  <div class="bastion-child video">
    $EmbedVideo
  </div>
  <% end_loop %>
</div>
<div class="bastion image">
  <% loop Images %>
  <div class="bastion-child">
    <img src="$Filename" alt="$Title image" data-jslghtbx />
  </div>
  <% end_loop %>
</div>
