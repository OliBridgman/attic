<section class="content">
  <h1>$Title</h1>
  $Content
</section>
<section class="bastion video">
  <% loop Videos %>
  <div class="bastion-child video">
    $EmbedVideo
  </div>
  <% end_loop %>
</section>
<section class="bastion image">
  <% loop Images %>
  <div class="bastion-child">
    <img src="$Filename" alt="$Title image" data-jslghtbx />
  </div>
  <% end_loop %>
</section>
<% if $Tags %>
  <h2 class="heading-wrap">Tags</h2>
  <section class="tags">
    <% loop Tags %>
      <a href="search?tag=$Title">$Title</a>
    <% end_loop %>
  </section>
<% end_if %>
