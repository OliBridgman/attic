<div>
  <h2>Recent Releases</h2>
  <ul>
    <% loop FeaturedReleases %>
      <li><a href="$ReleaseLink()">$Title</a></li>
    <% end_loop %>
  </ul>
</div>