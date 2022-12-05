<footer class="footer">
    <div class="footer_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('fronts/images/footer.jpg') }}"
        data-speed="0.8"></div>
    <div class="container">
        <div class="row">

            <div class="col-lg-4 footer_col">
                <div class="footer_column footer_contact_column">
                    <div class="footer_logo_container">
                        <a href="#">
                            <div class="footer_logo"><img src="{{ asset('fronts/images/logo_2.png') }}" alt=""></div>
                            <div class="footer_logo_text">{{ __('BRM') }}</div>
                        </a>
                    </div>
                    <div class="footer_contact">
                        <ul>
                            @forelse ($address as $item)
                            <li>
                                <div><i class="fa fa-map-marker" aria-hidden="true"></i></div><span>{!! $item->address !!}</span>
                            </li>
                            <li>
                                <div><i class="fa fa-phone" aria-hidden="true"></i></div><span>{!! $item->phone !!}</span>
                            </li>
                            <li>
                                <div><i class="fa fa-envelope" aria-hidden="true"></i></div><span>{!! $item->email !!}</span>
                            </li>
                            @empty
                            <li>
                                <div><i class="fa fa-map-marker" aria-hidden="true"></i></div><span>Kenya</span>
                            </li>
                            <li>
                                <div><i class="fa fa-phone" aria-hidden="true"></i></div><span>0123456789</span>
                            </li>
                            <li>
                                <div><i class="fa fa-envelope" aria-hidden="true"></i></div><span>info@example.com</span>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 footer_col">
                <div class="footer_column footer_links">
                    <div class="footer_title">{{ __('useful links') }}</div>
                    <ul class="footer_links_list">
                        <li><a href="{{ route('page.about') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ __('About us') }}</a></li>
                        <li><a href="{{ route('page.contact') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ __('Contact') }}</a></li>
                        <li><a href="{{ route('page.donation') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ __('Donation') }}</a></li>
                        <li><a href="{{ route('page.blog') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ __('Blog') }}</a></li>
                        <li><a href="{{ route('page.sermon') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ __('Sermons') }}</a></li>
                        <li><a href="{{ route('page.event') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ __('Events') }}</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ __('Service') }}</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ __('Media') }}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 footer_col">
                <div class="footer_column footer_subscribe">
                    <div class="footer_title">{{ __('subscribe') }}</div>
                    <div class="footer_text">{{ __('Join our weekly email newsletter to receive news, events and other announcements about what is going on at our church.') }}</div>
                    <div class="footer_form_container">
                        @if ($errors->any())
                        <div class="error-message" id='hideMe'>
                            @foreach ($errors->all() as $error)
                            <span style="color:#FF0000";>{{ $error }}</span>
                            @endforeach
                        </div>
                    @endif
                        <form action="{{ route('subscriber.store') }}" method="POST" class="footer_form" autocomplete="off">
                            @csrf
                            <div>
                                <input type="email" name="email" id="email" class="subscribe_input" placeholder="Enter your email" required="required">
                                <button class="subscribe_button trans_200" type="submit">{{ __('subscribe') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row copyright_row">
            <div class="col">
                <div
                    class="copyright_container d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
                    <div class="copyright">
                        {{ __('Copyright') }} &copy; {{ date('Y') }} {{ __('All rights reserved | This site is made with') }} <i class="fa-light fa-heart" aria-hidden="true"></i>
                        {{ __('by') }} <a href="mailto:mikebarasa@outlook.com">{{ __('Cydian') }}</a>
                    </div>
                    <div class="footer_social ml-lg-auto">
                        <ul>
                            @include('layouts.partials.social')
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
