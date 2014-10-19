<% with CurrentRelease %>
<section class="release">
  <div class="top-image" style="background-image: url('$BannerImage.url');">
  <h1>$Title</h1>
</section>
<section class="release-detail">
  <div class="left">
    $Content
  </div>
  <div class="right">
    <a class="btn-large bandcamp" href="$BandcampURL">Bandcamp</a>
  </div>
</section>
<% end_with %>