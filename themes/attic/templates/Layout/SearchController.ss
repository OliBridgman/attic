<section class="search-results">
  <h1>Search results for content tagged with <% if Tag %><span class="tag">$Tag</span><% end_if %></h1>
  <% if Results %>
    <ul class="accordion-tabs">
      <li class="tab-header-content">
        <a href="#" class="tab-link is-active">Artists</a>
        <div class="tab-content is-open roster">
          <% if Artists %>
            <% loop Artists %>
              <% include _ArtistTeaser %>
            <% end_loop %>
          <% else %>
            <h2>No Artists</h2>
          <% end_if %>
        </div>
      </li>
      <li class="tab-header-content">
        <a href="#" class="tab-link">Releases</a>
        <div class="tab-content releases">
          <% if Releases %>
            <% loop Releases %>
              <% include _ReleaseTeaser %>
            <% end_loop %>
          <% else %>
            <h2>No Releases</h2>
          <% end_if %>
        </div>
      </li>
      <li class="tab-header-content">
        <a href="#" class="tab-link">Media</a>
        <div class="tab-content media">
          <% if Media %>
            <% loop Media %>
              <% include _MediaTeaser %>
            <% end_loop %>
          <% else %>
            <h2>Mo Media</h2>
          <% end_if %>
        </div>
      </li>
      <li class="tab-header-content">
        <a href="#" class="tab-link">News</a>
        <div class="tab-content news">
          <% if News %>
            <% loop News %>
              <% include _NewsTeaser %>
            <% end_loop %>
          <% else %>
            <h2>No News</h2>
          <% end_if %>
        </div>
      </li>
    </ul>
  <% else %>
    <h2>No Results</h2>
  <% end_if %>
</section>