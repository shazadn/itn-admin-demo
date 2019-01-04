 <!doctype html>
    <html lang="{{ app()->getLocale() }}">
    <head>
       <meta name="csrf-token" content="{{ csrf_token() }}" />
      <title>Home</title>
    </head>
    
    <body>
            <h2><i class="logout"></i> <a href="{{ route('view.logout') }}" class="btn btn-default pull-right">Logout</a></h2>
            <h2><i class="Pages"></i> <a href="{{ route('view.pages') }}" class="btn btn-default pull-right">Pages</a></h2>
            <h2><i class="Gallery"></i> <a href="{{ route('view.gallery') }}" class="btn btn-default pull-right">Gallery</a></h2>
            <h2><i class="Contact"></i> <a href="{{ route('view.form') }}" class="btn btn-default pull-right">Contact</a></h2>
            <h2><i class="Products"></i> <a href="{{ route('view.products') }}" class="btn btn-default pull-right">Products</a></h2>
    </body>
    </html>