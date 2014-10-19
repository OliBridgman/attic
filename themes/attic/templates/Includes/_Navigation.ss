<nav>
  <% loop $Menu(1) %>
    <% if not $First %>
      <a href="$Link" title="Go to the $Title page" class="$LinkingMode">
        $MenuTitle.UpperCase
      </a>
    <% end_if %>
  <% end_loop %>
</nav>