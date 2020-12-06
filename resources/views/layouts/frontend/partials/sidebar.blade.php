<div class="col-md-4">

    <div class="sidebar-section">
        <aside class="wrapper__list__article">
            <h4 class="border_section">trending sports</h4>
            <!-- List Article -->
            <div class="card__post__content p-3 card__post__body-border-all">
                <div class="card__post__category text-capitalize">
                    travel
                </div>
                <div class="card__post__author-info mb-2">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                                            <span class="text-primary">
                                                by david hall
                                            </span>
                        </li>
                        <li class="list-inline-item">
                                            <span class="text-dark text-capitalize">
                                                descember 09, 2016
                                            </span>
                        </li>

                    </ul>
                </div>
                <div class="card__post__title">
                    <h5>
                        <a href="#">
                            Proin eu nisl et arcu iaculis placerat sollicitudin ut est
                        </a>
                    </h5>
                    <!-- <p>
Maecenas accumsan tortor ut velit pharetra mollis. Proin eu nisl et
arcu
iaculis
placerat
sollicitudin ut est. In fringilla dui dui.
</p>
<a href="#" class="btn btn-primary float-right">
read more
</a> -->
                </div>

            </div>
            <!-- List Article -->
            <div class="card__post__content p-3 card__post__body-border-all">
                <div class="card__post__category text-capitalize">
                    travel
                </div>
                <div class="card__post__author-info mb-2">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                                            <span class="text-primary">
                                                by david hall
                                            </span>
                        </li>
                        <li class="list-inline-item">
                                            <span class="text-dark text-capitalize">
                                                descember 09, 2016
                                            </span>
                        </li>

                    </ul>
                </div>
                <div class="card__post__title">
                    <h5>
                        <a href="#">
                            Proin eu nisl et arcu iaculis placerat sollicitudin ut est
                        </a>
                    </h5>
                    <!-- <p>
Maecenas accumsan tortor ut velit pharetra mollis. Proin eu nisl et
arcu
iaculis
placerat
sollicitudin ut est. In fringilla dui dui.
</p>
<a href="#" class="btn btn-primary float-right">
read more
</a> -->
                </div>

            </div>
            <!-- List Article -->
            <div class="card__post__content p-3 card__post__body-border-all">
                <div class="card__post__category text-capitalize">
                    travel
                </div>
                <div class="card__post__author-info mb-2">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                                            <span class="text-primary">
                                                by david hall
                                            </span>
                        </li>
                        <li class="list-inline-item">
                                            <span class="text-dark text-capitalize">
                                                descember 09, 2016
                                            </span>
                        </li>

                    </ul>
                </div>
                <div class="card__post__title">
                    <h5>
                        <a href="#">
                            Proin eu nisl et arcu iaculis placerat sollicitudin ut est
                        </a>
                    </h5>
                    <!-- <p>
Maecenas accumsan tortor ut velit pharetra mollis. Proin eu nisl et
arcu
iaculis
placerat
sollicitudin ut est. In fringilla dui dui.
</p>
<a href="#" class="btn btn-primary float-right">
read more
</a> -->
                </div>

            </div>
            <!-- List Article -->
            <div class="card__post__content p-3 card__post__body-border-all">
                <div class="card__post__category text-capitalize">
                    travel
                </div>
                <div class="card__post__author-info mb-2">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                                            <span class="text-primary">
                                                by david hall
                                            </span>
                        </li>
                        <li class="list-inline-item">
                                            <span class="text-dark text-capitalize">
                                                descember 09, 2016
                                            </span>
                        </li>

                    </ul>
                </div>
                <div class="card__post__title">
                    <h5>
                        <a href="#">
                            Proin eu nisl et arcu iaculis placerat sollicitudin ut est
                        </a>
                    </h5>
                    <!-- <p>
Maecenas accumsan tortor ut velit pharetra mollis. Proin eu nisl et
arcu
iaculis
placerat
sollicitudin ut est. In fringilla dui dui.
</p>
<a href="#" class="btn btn-primary float-right">
read more
</a> -->
                </div>

            </div>
        </aside>


        <!-- Category news -->
        <aside class="wrapper__list__article">
            <h4 class="border_section">বিভাগ</h4>
            <!-- Widget Category -->
            <div class="widget widget__category">
                <ul class="list-unstyled ">
                    @forelse($categories as $category)
                        <li>
                            <a href="#">
                                {{ $category->name }}
                                <span class="badge">{{ $category->posts()->count() }}</span>
                            </a>
                        </li>
                    @empty
                        No category found (:
                    @endforelse

                </ul>
            </div>
        </aside>
        <!-- End Category news -->
        <!-- Tags news -->
        <aside class="wrapper__list__article">
            <h4 class="border_section">ট্যাগ</h4>
            <div class="blog-tags p-0">
                <ul class="list-inline">

                    @forelse($tags as $tag)
                        <li class="list-inline-item">
                            <a href="#">
                                #{{$tag->name}}
                            </a>
                        </li>
                    @empty
                        No tag found (:
                    @endforelse
                </ul>
            </div>
        </aside>
        <!-- End Tags news -->


        <!-- Banner news -->
        <aside class="wrapper__list__article">
            <h4 class="border_section">Advertise</h4>
            <a href="#">
                <figure>
                    <img src="images/placeholder/600x600.jpg" alt="" class="img-fluid">
                </figure>
            </a>
        </aside>
        <!-- End Banner news -->
    </div>
    <!-- social media -->
    <aside class="wrapper__list__article">
        <h4 class="border_section">stay conected</h4>
        <!-- widget Social media -->
        <div class="wrap__social__media">
            <a href="#" target="_blank">
                <div class="social__media__widget facebook">
                                    <span class="social__media__widget-icon">
                                        <i class="fa fa-facebook"></i>
                                    </span>
                    <span class="social__media__widget-counter">
                                        19,243 fans
                                    </span>
                    <span class="social__media__widget-name">
                                        like
                                    </span>
                </div>
            </a>
            <a href="#" target="_blank">
                <div class="social__media__widget twitter">
                                    <span class="social__media__widget-icon">
                                        <i class="fa fa-twitter"></i>
                                    </span>
                    <span class="social__media__widget-counter">
                                        2.076 followers
                                    </span>
                    <span class="social__media__widget-name">
                                        follow
                                    </span>
                </div>
            </a>
            <a href="#" target="_blank">
                <div class="social__media__widget youtube">
                                    <span class="social__media__widget-icon">
                                        <i class="fa fa-youtube"></i>
                                    </span>
                    <span class="social__media__widget-counter">
                                        15,200 followers
                                    </span>
                    <span class="social__media__widget-name">
                       subscribe
                    </span>
                </div>
            </a>

        </div>
    </aside>
    <!-- End social media -->

    <!-- Newsletter news -->
    <aside class="wrapper__list__article">
        <h4 class="border_section">newsletter</h4>
        <!-- Form Subscribe -->
        <div class="widget__form-subscribe bg__card-shadow">
            <h6>
                The most important world news and events of the day.
            </h6>
            <p><small>Get magzrenvi daily newsletter on your inbox.</small></p>
            <form action="{{ route('subscriber.store') }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="email" name="email" class="form-control" placeholder="Your email address" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">sign up</button>
                    </div>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </form>
        </div>
    </aside>
    <!-- End Newsletter news -->
</div>
