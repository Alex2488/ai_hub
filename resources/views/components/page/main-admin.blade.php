@props(['title' => '', 'slug' => ''])

<section id="contact_section" class="contact_section sec_ptb_120 clearfix">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">

            <div class="col-lg-8 col-md-8 col-sm-10">
                <div class="contact_form" data-aos="fade-up" data-aos-delay="500">
                    @if ($title)
                        <div class="section_title decrease_size mb-50">
                            <h2 class="title_text mb-30">
                                Редагувати сервіс
                                <a href="{{url('/')}}/services/{{$slug}}">{{$title}}</a>
                            </h2>
                        </div>
                    @endif



                    {{$slot}}


                </div>
            </div>

        </div>
    </div>
</section>
