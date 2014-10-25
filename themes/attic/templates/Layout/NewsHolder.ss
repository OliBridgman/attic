<section>
  <% loop $Children %>
    <% if $Up.getAuthor %>
       <% if $Author == $Up.getAuthor %>
        <% include _NewsTeaser ParentLink=$Up.Link %>
      <% end_if %>
    <% else %>
      <% include _NewsTeaser ParentLink=$Up.Link %>
    <% end_if %>
  <% end_loop %>
</section>