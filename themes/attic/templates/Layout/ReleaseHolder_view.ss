<% with CurrentRelease %>
<section class="release">
  <div class="top-image" style="background-image: url('$BannerImage.url');">
  <h1>$Title</h1>
</section>
<section class="release-content">
    $Content
</section>
<section class="release-detail">
  <div class="half">
    $PreviewImage
  </div>
  <div class="half meta-info">
    <% if not $IsCompilation %>
      <p class="line"><strong>Artist:</strong> $SingleArtistName</p>
    <% end_if %>
    <p class="line"><strong>Title:</strong> $Title</p>
    <p class="line"><strong>Release No:</strong> $ReleaseNo</p>
    <% if $ReleaseDate %>
      <p class="line"><strong>Release Date:</strong> $ReleaseDate</p>
    <% end_if %>
    <div class="line">
      $MetaInfo
    </div>
    <div class="buttons">
      <% if $BandcampURL %>
        <a class="btn-large bandcamp" href="$BandcampURL">Purchase on Bandcamp</a>
      <% end_if %>
      <% if $TrackOne %>
        <div id="TrackOne"></div>
      <% end_if %>
      <% if $TrackTwo %>
        <div id="TrackTwo"></div>
      <% end_if %>
      <% if $TrackThree %>
        <div id="TrackThree"></div>
      <% end_if %>
    </div>
  </div>
</section>
<script src="//connect.soundcloud.com/sdk.js"></script>
<script>
  SC.initialize({
    client_id: "67de00bad7457adc86d2760f3a7bbb8f"
  });
  <% if $TrackOne %>
    SC.oEmbed("$TrackOne", {color: "#ff9900", iframe: true, maxheight: 81, show_comments: false},  document.getElementById("TrackOne"));
  <% end_if %>
  <% if $TrackTwo %>
    SC.oEmbed("$TrackTwo", {color: "#ff9900", iframe: true, maxheight: 81, show_comments: false},  document.getElementById("TrackTwo"));
  <% end_if %>
  <% if $TrackThree %>
    SC.oEmbed("$TrackTwo", {color: "#ff9900", iframe: true, maxheight: 81, show_comments: false},  document.getElementById("TrackThree"));
  <% end_if %>
</script>
<% end_with %>