@extends('layouts.master')
@section('title','Browse Research Interests & Themes')
@section('content')
    <div class="container">
        <h1>
            Browse Research Interests &amp; Themes
        </h1>
        <ul role="list" aria-label="Disciplines" class="list--hover">
            @foreach($parentInterests as $parent)
                <li role="listitem" class="list__item">
                    <a class="btn-link" href="{{route('search.research-interests', [
                        'searchType'=>'research-interest',
                        'query'     =>$parent->title
                    ])}}">
                        {{$parent->title}} ({{$parent->count}})
                    </a>
                    <ul role="list" aria-label="Sub-Disciplines of {{$parent->title}}" class="list--hover">
                        @foreach($parent->children as $child)
                            <li role="listitem" >
                                <a class="btn-link" href="{{route('search.research-interests', [
                                    'searchType'=>'research-interest',
                                    'query'     =>$child->title
                                ])}}">
                                    {{$child->title}} ({{$child->count}})
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
@endsection