<section>
  <% loop $Children %>
      <% if $Pos <= 3 %>
        <% include _NewsTeaser %>
      <% else %>
        <h3><a href="$Link">$Title</a></h3>
      <% end_if %>
  <% end_loop %>
</section>