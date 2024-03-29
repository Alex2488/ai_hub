@props(['label', 'name', 'class' => ''])

<div class="form_item m-0">
    <h6 class="ml-5">{{$label}}</h6>

    <textarea type="textarea"
              id="content-textarea"
              style="display: none"
              name="{{$name}}"
                {{ $attributes }}
    >{{ old($name) ?? $slot }}
    </textarea>

    <x-page.error
        name="{{$name}}"
    >
    </x-page.error>
</div>


