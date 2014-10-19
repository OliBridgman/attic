<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie ie8"><![endif]-->
<!--[if IE 9]><html lang="en" class="ie ie9"><![endif]-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>$SiteConfig.Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  $MetaTags("false")

  <% base_tag %>

  <link href="themes/attic/stylesheets/screen.css" rel="stylesheet" type="text/css" media="screen">
  <%-- <link href="themes/attic/stylesheets.print.css" rel="stylesheet" type="text/css" media="print"> --%>

  <!--[if lt IE 9]>
  <link rel="stylesheet" href="themes/attic/stylesheets/ie.css" rel="stylesheet" type="text/css" media="screen">
  <script src="themes/attic/javascripts/html5shiv.js"></script>
  <![endif]-->

</head>

<body>
  <div class="container">
    <% include _Header %>
    <article class="main">
      $Layout
      $Form
    </article>
    <%-- <aside class="sidebar">
      <% include _Sidebar %>
    </aside> --%>
  </div>
  <% include _Footer %>
</body>
</html>