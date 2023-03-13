
<x-layout>
    <x-hero/>
    <x-blog-section :blogs='$blogs' :categories='$categories' :currentCategory='$currentCategory ?? null'/>
    <x-subscribe/>
</x-layout>
