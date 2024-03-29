<x-layout>

    <x-page.breadcrumb title="Редагувати сервіс">
        <li>
            <a href="{{route('show-services')}}">Сервіси</a>
        </li>
    </x-page.breadcrumb>

    <!-- contact_section - start
				================================================== -->
    <x-page.main-admin
        title="{{$service->title}}"
        slug="{{$service->slug}}">

        <form action="{{ route('update-service', $service->id )}}" method="POST" enctype="multipart/form-data">

            @csrf


            <x-form.input
                label="Найменування сервісу"
                name="title"
                :value="old('title', $service->title)"
            >
            </x-form.input>

            <x-form.input
                label="URL строка"
                name="slug"
                :value="old('slug', $service->slug)"
            >
            </x-form.input>

            <x-form.input
                label="Посилання на сервіс"
                name="link_to_service"
                :value="old('link_to_service', $service->link_to_service)"
            >
            </x-form.input>

            <x-form.input
                label="Розробник"
                name="developer"
                :value="old('developer', $service->developer)"
            >
            </x-form.input>

            <x-form.input
                label="Рік випуску"
                name="release_date"
                :value="old('release_date', $service->release_date)"
            >
            </x-form.input>

            <x-form.input-image
                label="Завантажити новий логотип"
                name="logo"
                :value="old('logo', $service->logo)"
                img="{{$service->logo}}"
            >
            </x-form.input-image>

            <x-form.input-dropdown
                name="category_id"
                id="inputGroupSelect01"
                label="Категорія"
            >

                @foreach ($categories as $category)

                        <option
                            value="{{$category->id}}"
                            {{$category->id === $service->category->id ? 'selected' : ''}}
                        >{{$category->name}}</option>

                @endforeach

            </x-form.input-dropdown>

            <x-form.input-dropdown-tags
                name="tags[]"
                label="Теги"
                :value="old('tags[]')"
            >
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}"
                        @foreach($service->tags as $service_tag)
                            {{$tag->id === $service_tag->id ? 'selected' : ''}}
                        @endforeach
                    >{{$tag->name}}</option>
                @endforeach
            </x-form.input-dropdown-tags>

            <x-form.input-image
                label="Завантажити зображення"
                name="image"
                img="{{$service->image}}">
            </x-form.input-image>

            <x-form.input-textarea
                label="Короткий опис"
                name="excerpt"
            >{{old('excerpt', $service->excerpt)}}
            </x-form.input-textarea>

            <x-form.input-text
                class="editor"
                label="Повний опис"
                name="main_content"
                :value="old('main_content')"
            >
                {{old('main_content', $service->main_content)}}
            </x-form.input-text>

            <div id="editor" class="mb-4">
                {!! isset($service->main_content) ? $service->main_content : '' !!}
            </div>

            <x-form.input-dropdown
                name="is_published"
                label="Опублікувати?"
            >
                <option value="1" {{$service->is_published ? 'selected' : ''}}>Так</option>
                <option value="0" {{$service->is_published ? '' : 'selected'}}>Ні</option>
            </x-form.input-dropdown>


            <x-form.buttons-container>
                <x-form.a-white
                    href="{{route('show-services')}}"
                    name="Назад"
                >
                </x-form.a-white>

                <x-form.submit
                    name="Зберегти"
                >
                </x-form.submit>
            </x-form.buttons-container>


        </form>
    </x-page.main-admin>
    <!-- contact_section - end
    ================================================== -->
    @include('admin.include.quill')
</x-layout>





