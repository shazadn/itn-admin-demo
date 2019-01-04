
<!DOCTYPE html>
<html ang="{{ app()->getLocale() }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
            <style>
                body {font-family: Arial, Helvetica, sans-serif;}
                * {box-sizing: border-box;}

                input[type=text], select, textarea {
                    width: 100%;
                    padding: 12px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;
                    margin-top: 6px;
                    margin-bottom: 16px;
                    resize: vertical;
                }

                input[type=submit] {
                    background-color: #4CAF50;
                    color: white;
                    padding: 12px 20px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }

                input[type=submit]:hover {
                    background-color: #45a049;
                }

                .container {
                    border-radius: 5px;
                    background-color: #f2f2f2;
                    padding: 20px;
                }
            </style>
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
                         
              <h3>Contact Form</h3>
                <div class="container">
                  <form action="{{ route('submit.form') }}" method="POST">
                      {{ csrf_field() }}
                   <div class="form-input">   
                    <label for="name">First Name</label>
                        <input type="text" id="name" name="name" placeholder="Your name..">
                   </div>
                   <div class="form-input">
                    <label for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="Your email..">
                   </div>
                   <div class="form-input">
                    <label for="message">Subject</label>
                        <textarea id="message" name="message" placeholder="Your message.." style="height:150px"></textarea>
                    </div>
                      <button type="submit"> Submit </button>
                  </form>
                    </div>
                   </div>
                </div>
            </body>
</html>