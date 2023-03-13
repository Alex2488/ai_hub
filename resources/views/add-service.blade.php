<x-layout>

    <section id="breadcrumb_section"
             class="breadcrumb_section bg_gradient_blue deco_wrap d-flex align-items-center text-white clearfix">
        <div class="container">
            <div class="breadcrumb_content text-center decrease_size" data-aos="fade-up" data-aos-delay="100">
                <h1 class="page_title mb-30">
                    Додати сервіс
                </h1>
                <div class="breadcrumb_nav ul_li_center">
                    <ul class="clearfix">
                        <li>
                            <a href="{{url('/')}}">Головна</a>
                        </li>
                        <li>
                            Додати сервіс
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="deco_image spahe_1" data-aos="fade-down" data-aos-delay="300">
            <img src="{{url('/')}}/assets/images/shapes/shape_1.png" alt="spahe_not_found">
        </div>
        <div class="deco_image spahe_2" data-aos="fade-up" data-aos-delay="400">
            <img src="{{url('/')}}/assets/images/shapes/shape_2.png" alt="spahe_not_found">
        </div>
    </section>

    <!-- contact_section - start
				================================================== -->
    <section id="contact_section" class="contact_section sec_ptb_120 clearfix">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">

                <div class="col-lg-8 col-md-8 col-sm-10">
                    <div class="contact_form" data-aos="fade-up" data-aos-delay="500">

                        <div class="section_title decrease_size mb-50">
                            <h2 class="title_text mb-30">Додати новий сервіс</h2>

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <form action="{{route('submit-service')}}" method="post" enctype="multipart/form-data">

                            @csrf
                            <div class="form_item">
                                <input type="text" name="title" placeholder="Найменування сервісу">
                            </div>
                            <div class="form_item">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="logo">
                                        <label class="custom-file-label">Завантажити логотип</label>
                                    </div>
                            </div>
                            <div class="form_item">
                                <input type="text" name="link_to_service"
                                       placeholder="Посилання на сервіс">
                            </div>
                            <div class="form_item dropdown">
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="category_id" id="inputGroupSelect01">
                                        <option selected disabled> Категорія</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form_item">

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image">
                                    <label class="custom-file-label">Завантажити зображення</label>
                                </div>
                            </div>

                            <div class="form_item">
                                <textarea name="excerpt" placeholder="Короткий опис -  до 140 символів"></textarea>
                            </div>

                            <div class="form_item">
                                <h6 class="ml-5">Повний опис - загальна інформація</h6>
                                <textarea name="information_1" placeholder="Перший абзац"></textarea>

                            </div>
                            <div class="form_item">

                            <textarea name="information_2" placeholder="Другий абзац"></textarea>
                            </div>
                            <div class="form_item">

                                <textarea name="information_3" placeholder="Третій абзац"></textarea>
                            </div>

                            <div class="form_item">
                                <h6 class="ml-5">Основний функціонал</h6>

                                <textarea name="functionality_1" placeholder="Перший пункт"></textarea>

                            </div>
                            <div class="form_item">

                                <textarea name="functionality_2" placeholder="Другий пункт"></textarea>
                            </div>
                            <div class="form_item">

                                <textarea name="functionality_3" placeholder="Третій пункт"></textarea>
                            </div>

                            <div class="form_item">

                                <textarea name="functionality_4" placeholder="Четвертий пункт"></textarea>
                            </div>

                            <div class="form_item">
                                <h6 class="ml-5">Переваги</h6>

                                <textarea name="benefits_1" placeholder="Перший абзац"></textarea>

                            </div>
                            <div class="form_item">

                                <textarea name="benefits_2" placeholder="Другий абзац"></textarea>
                            </div>
                            <div class="form_item">

                                <textarea name="benefits_3" placeholder="Третій абзац"></textarea>
                            </div>

                            <div class="btn_wrap">
                                <button type="submit" class="btn bg_default_blue">Додати сервіс</button>
                            </div>




                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- contact_section - end
    ================================================== -->

</x-layout>





