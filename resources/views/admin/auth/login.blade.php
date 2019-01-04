 <!doctype html>
    <html lang="{{ app()->getLocale() }}">
    <head>
       <meta name="csrf-token" content="{{ csrf_token() }}" />
      <title>Login Page</title>
      <!-- styling etc. -->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                
                @if ($errors->any())
                     <div class="alert alert-danger">
                         <ul>
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                 @endif
                
                <form method="POST" action="{{ route('post.login') }}">
                    {{ csrf_field() }}
                    <h1> Login</h1>
                    <div class="form-input">
                        <label>Email</label> <input type="text" name="email">
                    </div>

                    <div class="form-input">
                        <label>Password</label> <input type="text" name="password">
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </body>
</html>