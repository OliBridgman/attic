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
    <% if $FacebookURL %>
      <a class="btn-large facebook" href="$FacebookURL">Facebook</a>
    <% end_if %>
    <% if $TwitterURL %>
      <a class="btn-large twitter" href="$TwitterURL">Twitter</a>
    <% end_if %>
    <% if $BandcampURL %>
      <a class="btn-large bandcamp" href="$BandcampURL">Bandcamp</a>
    <% end_if %>
    <% if $CartelURL %>
      <a class="btn-large CartelURL" href="$CartelURL">BigCartel</a>
    <% end_if %>
  </div>
</section>
<% if $Releases %>
  <h2 class="heading-wrap">Releases</h2>
  <section class="releases">
    <% loop Releases %>
      <% include _ReleaseTeaser %>
    <% end_loop %>
  </section>
<% end_if %>
<% if $Media %>
  <h2 class="heading-wrap">Media</h2>
  <section class="media">
  <% loop Media %>
    <% include _MediaTeaser %>
  <% end_loop %>
  </section>
<% end_if %>
<% if $Tags %>
  <h2 class="heading-wrap">Tags</h2>
  <section class="tags">
    <% loop Tags %>
      <a href="$SearchByTag?tag=$Title">$Title</a>
    <% end_loop %>
  </section>
<% end_if %>