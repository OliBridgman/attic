<section class="artist">
  <div class="top-image" style="background-image: url('$BannerImage.url');">
    <h1>$Title</h1>
  </div>
</section>
<section class="artist-detail">
  <div class="left">
    $Content
  </div>
  <div class="right">
    <a class="btn-large facebook" href="$FacebookURL">Facebook</a>
    <a class="btn-large twitter" href="$TwitterURL">Twitter</a>
    <a class="btn-large bandcamp" href="$BandcampURL">Bandcamp</a>
    <a class="btn-large CartelURL" href="$CartelURL">BigCartel</a>
  </div>
</section>
<h2 class="heading-wrap">Releases</h2>
<section class="releases">
  <% loop Releases %>
    <% include _ReleaseTeaser %>
  <% end_loop %>
</section>
<h2 class="heading-wrap">Media</h2>
<section class="media">
<% loop Media %>
  <% include _MediaTeaser %>
<% end_loop %>
</section>

<section class="tags">
<h2 class="heading-wrap">Tags</h2>
  <% loop Tags %>
    <h3><a href="$SearchByTag?tag=$Title">$Title</a></h3>
  <% end_loop %>
</section>