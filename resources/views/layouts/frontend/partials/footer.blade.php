<section class="wrapper__section p-0">
    <div class="wrapper__section__components">
        <!-- Footer  -->
        <footer>
            <div class="wrapper__footer bg__footer ">
                <div class=" container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="widget__footer">
                                <!-- <h4 class="footer-title">company info</h4> -->
                                <figure>
                                    <img src="images/placeholder/logo.jpg" alt="" class="logo-footer">
                                </figure>
                                <p>
                                    Retnews is a premium magazine template based on Bootstrap 4.
                                    We bring you the best Premium Themes that perfect for news, magazine, personal
                                    blog, etc.
                                    <br>
                                    <!-- <a href=" #" class="btn btn-primary mt-4 text-white">About us</a> -->
                                </p>
                            </div>
                            <div class="border-line"></div>
                            <div class="widget__footer">
                                <h4 class="footer-title">follow us </h4>
                                <!-- <p>
                        Follow us and stay in touch to get the latest news
                    </p> -->
                                <p>
                                    <button class="btn btn-social btn-social-o facebook mr-1">
                                        <i class="fa fa-facebook-f"></i>
                                    </button>
                                    <button class="btn btn-social btn-social-o twitter mr-1">
                                        <i class="fa fa-twitter"></i>
                                    </button>

                                    <button class="btn btn-social btn-social-o linkedin mr-1">
                                        <i class="fa fa-linkedin"></i>
                                    </button>
                                    <button class="btn btn-social btn-social-o instagram mr-1">
                                        <i class="fa fa-instagram"></i>
                                    </button>

                                    <button class="btn btn-social btn-social-o youtube mr-1">
                                        <i class="fa fa-youtube"></i>
                                    </button>
                                </p>
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="col-md-4">
                            <div class="widget__footer">
                                <h4 class="footer-title">category</h4>
                                <div class="link__category">
                                    <ul class="list-unstyled ">
                                        @forelse($categories as $category)
                                            <li class="list-inline-item">
                                                <a href="#">{{ $category->name }}</a>
                                            </li>
                                        @empty
                                            <li>No category found (:</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="widget__footer">
                                <h4 class="footer-title">newsletter</h4>
                                <!-- Form Newsletter -->

                                <div class="widget__form-newsletter ">
                                    <p>

                                        Don’t miss to subscribe to our news feeds, kindly fill the form below
                                    </p>
                                    <div class="mt-3">
                                        <form action="{{ route('subscriber.store') }}" method="post">
                                            @csrf
                                            <div class="input-group">
                                                <input type="email" name="email" required class="form-control mb-2"
                                                       placeholder="Your email address">
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <button class="btn btn-primary btn-block" type="submit">subscribe</button>
                                        </form>


                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="bg__footer-bottom ">
                <div class="container">
                    <div class="row flex-column-reverse flex-md-row">
                        <div class="col-md-6">
                                <span>
                                    © 2020 Magzrenvi - Premium laravel news & magazine theme by
                                    <a href="#">retenvi.com</a>
                                </span>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-inline ">
                                <li class="list-inline-item">
                                    <a href="#">
                                        privacy
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        contact
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        about
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        faq
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer  -->
    </div>
</section>
