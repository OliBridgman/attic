<h1>Search Results</h1>
<% if Results %>
  <% loop Artists %>
    <h3>$Title</h3>
  <% end_loop %>
  <% loop Releases %>
    <h3>$Title</h3>
  <% end_loop %>
  <% loop Media %>
    <h3>$Title</h3>
  <% end_loop %>
  <% loop News %>
    <h3>$Title</h3>
  <% end_loop %>
<% else %>
  <h2>No Results</h2>
<% end_if %>