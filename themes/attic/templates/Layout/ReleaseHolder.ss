<section class="content">
  <h1>$Title</h1>
  $Content
</section>
<section class="releases">
<% if SinglesClub %>
  <% loop SinglesClubReleases %>
    <% include _ReleaseTeaser %>
  <% end_loop %>
<% else %>
  <% loop RegularReleases %>
    <% include _ReleaseTeaser %>
  <% end_loop %>
<% end_if %>
</section>