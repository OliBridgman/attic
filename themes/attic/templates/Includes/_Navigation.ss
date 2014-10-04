<nav>
  <% loop $Menu(1) %>
    <a href="$Link" title="Go to the $Title page" class="$LinkingMode">
      $MenuTitle.UpperCase
    </a>
  <% end_loop %>
</nav>