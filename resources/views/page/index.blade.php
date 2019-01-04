@extends('layouts.app')

@section('content')

<!-- Panel (Banner) -->
<section class="panel banner right">
    <div class="content color0 span-3-75">
        <h1 class="major">Milaap, asian wedding<br />
            and event planner</h1>
        <p>This is <strong>Milaap</strong>, a unique asian wedding and event planner. We offer wide range of service including venue, catering and decoration etc.</p>
        <ul class="actions">
            <li><a href="#first" class="button primary color1 circle icon fa-angle-right">Next</a></li>
        </ul>
    </div>
    <div class="image filtered span-1-75" data-position="25% 25%">
        <img src="{{ asset('images/pic01.jpg') }}" alt="" />
    </div>
</section>

<!-- Panel (Spotlight) -->
<section class="panel spotlight medium right" id="first">
    <div class="content span-7">
        <h2 class="major">About Us</h2>
        <p><strong>Milaap</strong>, a Hindi word, meaning bringing people together, is one of the leading catering and event Management Companies based in Wilmslow, Cheshire. The name <strong>Milaap</strong> derives from the extraordinary creative itself. We do not believe in a formulaic approach, But in a completely bespoke service.</p>
        <p><strong>Milaap</strong> place great emphasis on providing high quality customer service, achieving this with a flexible and friendly approach to our customer’s needs. Drafting an event can be very time consuming when spending hundreds of hours exploring reliable and reputable services, from florist to caterers, and from photographer to decorators. We can prepare, organize and co-ordinate an individual’s event in accordance to their highest personal standards.</p>
    </div>
    <div class="image filtered tinted" data-position="top left">
        <img src="{{ asset('images/pic03.jpg') }}" alt="" />
    </div>
</section>

<!-- Panel (Spotlight) -->
<section class="panel spotlight large left">
    <div class="content span-5">
        <h2 class="major">Our Services</h2>
        <p><strong>Milaap</strong> provide a sophisticated range of services, from venues and entertainment, to the finest food and drink available. Corporate events, weddings, banquets, parties and special events can all be catered for.</p>
        <ul class="col-2">
            <li>Wedding</li>
            <li>Catering</li>
            <li>Venue</li>
            <li>Decoration</li>
            <li>Birthday Parties</li>
            <li>Special Events</li>
            <li>Corporate Events</li>
            <li>DJ and Chocolate Fountain</li>
        </ul>
    </div>
    <div class="image filtered tinted" data-position="top right">
        <img src="{{ asset('images/pic02.png') }}" alt="" />
    </div>
</section>

<!-- Panel -->
<section class="panel">
    <div class="intro color2">
        <h2 class="major">Our Work</h2>
        <p>Here is some of our work ranging from venue, wedding stage and table decoration to catering.</p>
    </div>
    <div class="gallery">
        <div class="group span-3">
            <a href="{{ asset('images/gallery/819411_10151411938774749_653716899_o[1].jpg') }}" class="image filtered span-3" data-position="bottom"><img src="{{ asset('images/gallery/819411_10151411938774749_653716899_o[1].jpg') }}" alt="" /></a>
            <a href="{{ asset('images/gallery/FB_IMG_1504961912766_1506244963354.jpg') }}" class="image filtered span-1-5" data-position="center"><img src="{{ asset('images/gallery/FB_IMG_1504961912766_1506244963354.jpg') }}" alt="" /></a>
            <a href="{{ asset('images/gallery/2986231725_f4ab0b0cc0_o.jpg') }}" class="image filtered span-1-5" data-position="bottom"><img src="{{ asset('images/gallery/2986231725_f4ab0b0cc0_o.jpg') }}" alt="" /></a>
        </div>
        <a href="{{ asset('images/gallery/10320889_691781174203771_1929402647376122895_o.jpg') }}" class="image filtered span-2-5" data-position="top"><img src="{{ asset('images/gallery/10320889_691781174203771_1929402647376122895_o.jpg') }}" alt="" /></a>
        <div class="group span-4-5">
            <a href="{{ asset('images/gallery/26173273_10156055463723588_8816026861717112295_o.jpg') }}" class="image filtered span-3" data-position="top"><img src="{{ asset('images/gallery/26173273_10156055463723588_8816026861717112295_o.jpg') }}" alt="" /></a>
            <a href="{{ asset('images/gallery/wedding_food.jpg') }}" class="image filtered span-1-5" data-position="center"><img src="{{ asset('images/gallery/wedding_food.jpg') }}" alt="" /></a>
            <a href="{{ asset('images/gallery/001-4-2.jpg') }}" class="image filtered span-1-5" data-position="bottom"><img src="{{ asset('images/gallery/001-4-2.jpg') }}" alt="" /></a>
            <a href="{{ asset('images/gallery/_DSC8155.jpg') }}" class="image filtered span-3" data-position="top"><img src="{{ asset('images/gallery/_DSC8155.jpg') }}" alt="" /></a>
        </div>
        <a href="{{ asset('images/gallery/856605_412180755576384_1874007306_o.jpg') }}" class="image filtered span-2-5" data-position="right"><img src="{{ asset('images/gallery/856605_412180755576384_1874007306_o.jpg') }}" alt="" /></a>
    </div>
</section>

<!-- Panel -->
<section class="panel color4-alt">
    <div class="intro color4">
        <h2 class="major">Contact</h2>
        <p>We would love to hear from you so feel free to get in touch with us. Send us a message using the contact form or follow us on social media.</p>
    </div>
    <div class="inner columns divided">
        <div class="span-3-25">
            <div class="alert alert-success hidden"></div>
            <form method="POST" action="{{ request()->url() }}" class="ajax-submit" data-reset="true">
                {{ csrf_field() }}
                <div class="fields">
                    <div class="field half field-name form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" />
                        <p class="validation-error"></p>
                    </div>
                    <div class="field half field-email form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" />
                        <p class="validation-error"></p>
                    </div>
                    <div class="field field-message form-group">
                        <label for="message">Message</label>
                        <textarea name="message" class="no-resize" id="message" rows="4"></textarea>
                        <p class="validation-error"></p>
                    </div>
                </div>
                <ul class="actions">
                    <li><button type="button" class="button primary submit-form">Send Message</button></li>
                    <li class="icon-loading hidden"><i class="icon fa fa-circle-o-notch fa-spin fa-2x fa-fw"></i></li>
                </ul>
            </form>
        </div>
        <div class="span-1-5">
            <ul class="contact-icons color1">
                <li class="icon fa-facebook"><a href="https://www.facebook.com/milaapuk" target="_blank">facebook.com/milaapuk</a></li>
                <li class="icon fa-twitter"><a href="https://twitter.com/Milaapevents" target="_blank">@Milaapevents</a></li>
                <li class="icon fa-instagram"><a href="https://www.instagram.com/milaapevents" target="_blank">@milaapevents</a></li>
                <li class="icon fa-envelope"><a href="mailto:{{ $adminEmail }}">{{ $adminEmail }}</a></li>
                <li class="icon fa-map"><a href="https://goo.gl/maps/RmMMKnkhtjz" target="_blank">Office Location</a></li>
            </ul>
        </div>
    </div>
</section>

@endsection
