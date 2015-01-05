<section class="news-item">
  <div class="top-image" style="background-image: url('$BannerImage.url');">
    <h1>$Title</h1>
  </div>
  <p class="detail">Posted By <a href="$Parent.Link?author=$Author">$Author</a> | $Date.Nice</p>
  <hr class="line-break" />
  $Content
</section>

<h2 class="heading-wrap">Tags</h2>
<section class="tags">
  <% loop Tags %>
    <a href="$SearchByTag?tag=$Title">$Title</a>
  <% end_loop %>
</section>