@section('content')

<!-- ==================== Blog Start Here ==================== -->
<section class="blog py-80 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-heading  text-center">
                    <span class="subtitle">Blog</span>
                    <h2 class="section-heading__title"> News & Feeds.</h2>
                </div>
            </div>
        </div>

        <div class="row gy-4 justify-content-center" id="blog-item">
           
        </div>
    </div>
</section>
<!-- ==================== Blog End Here ==================== -->
<!-- Jquery js -->
<script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>

{{-- @section('script') --}}

<script>
    (async () => {
        try{
            const URL = "{{ url('/allBlog')}}";
            const response = await axios.get(URL);

            console.log(response.data['title']);

            response.data.forEach((item)=>{
                console.log(item);
                document.getElementById('blog-item').innerHTML+=(` <div class="col-lg-4 col-md-6">
                <div class="blog-item" id="blog-item">
                    <div class="blog-item__thumb">
                        <a href="blog-details.html" class="blog-item__thumb-link">
                            <img src="${item['image']}" alt="">
                        </a>
                    </div>
                    <div class="blog-item__content">
                        <ul class="text-list inline">
                            <li class="text-list__item"> <span class="text-list__item-icon"><i
                                        class="fas fa-calendar-alt"></i></span> 09 Jun 2023</li>
                            <li class="text-list__item"> <span class="text-list__item-icon"><i
                                        class="fa-solid fa-user"></i></span> By Admin</li>
                        </ul>
                        <h4 class="blog-item__title"><a href="blog-details.html" class="blog-item__title-link">${item['title']}</a></h4>
                        <p class="blog-item__desc">${item['description']}</p>
                        <a href="blog-details.html" class="btn--simple">Read More <span class="btn--simple__icon"><i
                                    class="fas fa-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>`)

            })


        }catch(error) {
            console.log(error);
        }
    })();
     
</script>
{{-- @endsection --}}

@endsection('conte')