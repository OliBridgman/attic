<section>
  $Content
  <% loop $LatestNews %>
    <div class="news">
      <% include _NewsTeaser %>
    </div>
  <% end_loop %>
</section>